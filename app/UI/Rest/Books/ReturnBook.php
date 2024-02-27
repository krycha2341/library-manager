<?php

namespace App\UI\Rest\Books;

use App\Exceptions\CannotReturnBookException;
use App\Services\BooksService;
use App\UI\Base;
use Illuminate\Http\JsonResponse;

class ReturnBook extends Base
{
    public function __construct(readonly private BooksService $booksService)
    {
    }

    /**
     * @throws CannotReturnBookException
     */
    public function __invoke(int $id, int $customerId): JsonResponse
    {
        $this->booksService->returnBook($id, $customerId);

        return $this->emptyResponse();
    }
}
