<?php

namespace App\Services;

use App\DataTransferObjects\BookListDTO;
use App\Enums\BookStatus;
use App\Exceptions\CannotBorrowBookException;
use App\Exceptions\CannotReturnBookException;
use App\Exceptions\CustomerDoesNotExistException;
use App\Repositories\BooksRepository;
use App\ValueObjects\BookVO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BooksService
{
    public function __construct(
        readonly private BooksRepository $booksRepository,
        readonly private CustomersService $customersService
    ) {
    }

    public function list(BookListDTO $dto): array
    {
        return $this->booksRepository->list($dto);
    }

    public function get(int $id): BookVO
    {
        return $this->booksRepository->get($id);
    }

    /**
     * @throws CustomerDoesNotExistException
     * @throws CannotBorrowBookException
     */
    public function borrowBook(int $id, int $customerId): void
    {
        $book = $this->booksRepository->get($id);
        if ($book->getCustomerVO() !== null) {
            throw new CannotBorrowBookException('The Book has already been borrowed');
        }

        try {
            $customer = $this->customersService->get($customerId);
        } catch (ModelNotFoundException $exception) {
            throw new CustomerDoesNotExistException();
        }

        $book->setCustomerVO($customer);
        $book->setStatus(BookStatus::BORROWED);

        $this->booksRepository->update($book);
    }

    /**
     * @throws CannotReturnBookException
     */
    public function returnBook(int $id, int $customerId): void
    {
        $book = $this->booksRepository->get($id);
        if ($book->getCustomerVO() === null) {
            throw new CannotReturnBookException('Wrong book ID provided');
        } elseif ($book->getCustomerVO()->getId() !== $customerId) {
            throw new CannotReturnBookException('Wrong book ID provided');
        }

        $book->setCustomerVO(null);
        $book->setStatus(BookStatus::READY);

        $this->booksRepository->update($book);
    }
}
