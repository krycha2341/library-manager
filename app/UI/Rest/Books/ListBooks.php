<?php

namespace App\UI\Rest\Books;

use App\DataTransferObjects\BookListDTO;
use App\Requests\ListBooksRequest;
use App\Services\BooksService;
use App\UI\Base;
use App\UI\Presentation\BookTransformer;
use Illuminate\Http\JsonResponse;

class ListBooks extends Base
{
    public function __construct(readonly private BooksService $booksService)
    {
    }

    public function __invoke(ListBooksRequest $request): JsonResponse
    {
        $books = $this->booksService->list(
            new BookListDTO(
                $request->get('limit', 20),
                $request->get('offset', 0),
                $request->get('title'),
                $request->get('author'),
                $request->get('first_name'),
                $request->get('last_name')
            )
        );

        return $this->collectionResponse($books, new BookTransformer());
    }
}
