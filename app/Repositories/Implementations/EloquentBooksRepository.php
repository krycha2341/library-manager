<?php

namespace App\Repositories\Implementations;

use App\DataTransferObjects\BookListDTO;
use App\Mappers\BookVOMapper;
use App\Models\Book;
use App\Repositories\BooksRepository;
use App\ValueObjects\BookVO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentBooksRepository implements BooksRepository
{
    public function list(BookListDTO $dto): array
    {
        $query = Book::query()->limit($dto->getLimit())
            ->offset($dto->getOffset())
            ->with('customer');

        if ($dto->getTitle() !== null) {
            $query->where('title','LIKE', '%' . $dto->getTitle() . '%');
        }
        if ($dto->getAuthor() !== null) {
            $query->where('author','LIKE', '%' . $dto->getAuthor() . '%');
        }
        $isFirstNameNull = ($dto->getCustomerFirstName() === null);
        $isLastNameNull = ($dto->getCustomerLastName() === null);
        if (!$isFirstNameNull || !$isLastNameNull) {
            $query->whereHas(
                'customer',
                function ($query) use ($dto, $isFirstNameNull, $isLastNameNull) {
                    if (!$isFirstNameNull) {
                        $query->where('first_name', 'LIKE', '%' . $dto->getCustomerFirstName() . '%');
                    }
                    if (!$isFirstNameNull) {
                        $query->where('last_name', 'LIKE', '%' . $dto->getCustomerLastName() . '%');
                    }
                }
            );
        }

        $bookModels = $query->get();

        foreach ($bookModels as $book) {
            $results[] = BookVOMapper::fromEloquentModel($book);
        }

        return $results ?? [];
    }

    public function get(int $id): BookVO
    {
        /** @var Book $book */
        $book = Book::query()->where('id', $id)->with('customer')->first();

        if ($book === null) {
            throw new ModelNotFoundException();
        }

        return BookVOMapper::fromEloquentModel($book);
    }

    public function update(BookVO $bookVO): void
    {
        /** @var Book $book */
        $book = Book::where('id', $bookVO->getId())->first();

        if ($book === null) {
            return;
        }

        $book->status = $bookVO->getStatus();
        $book->customer_id = $bookVO->getCustomerVO()?->getId();
        $book->save();
    }
}
