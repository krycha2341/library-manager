<?php

namespace App\Mappers;

use App\Models\Book;
use App\ValueObjects\BookVO;

class BookVOMapper
{
    public static function fromEloquentModel(Book $book, bool $withRelations = true): BookVO
    {
        if ($book->customer !== null && $withRelations) {
            $customer = CustomerVOMapper::fromEloquentModel($book->customer, false);
        }

        return new BookVO(
            $book->id,
            $book->title,
            $book->author,
            $book->publication_date,
            $book->print,
            $book->status,
            $book->created_at,
            $book->updated_at,
            $customer ?? null
        );
    }
}
