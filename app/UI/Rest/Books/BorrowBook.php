<?php

namespace App\UI\Rest\Books;

use App\Exceptions\CannotBorrowBookException;
use App\Exceptions\CustomerDoesNotExistException;
use App\Services\BooksService;
use App\UI\Base;
use Illuminate\Http\JsonResponse;

class BorrowBook extends Base
{
    public function __construct(readonly private BooksService $booksService)
    {
    }

    /**
     * @throws CustomerDoesNotExistException
     * @throws CannotBorrowBookException
     */
    public function __invoke(int $id, int $customerId): JsonResponse
    {
        $this->booksService->borrowBook($id, $customerId);

        return $this->emptyResponse();
    }
}
