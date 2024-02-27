<?php

namespace App\UI\Rest\Books;

use App\Services\BooksService;
use App\UI\Base;
use App\UI\Presentation\BookTransformer;
use Illuminate\Http\JsonResponse;

class BookDetails extends Base
{
    public function __construct(readonly private BooksService $booksService)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $book = $this->booksService->get($id);

        return $this->itemResponse($book, new BookTransformer());
    }
}
