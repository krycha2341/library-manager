<?php

namespace App\UI\Presentation;

use App\ValueObjects\CustomerVO;
use League\Fractal\TransformerAbstract;

class CustomerWithBooksTransformer extends TransformerAbstract
{
    public function transform(CustomerVO $customerVO): array
    {
        if ($customerVO->getBooks() !== null) {
            foreach ($customerVO->getBooks() as $book) {
                $books[] = [
                    'title' => $book->getTitle(),
                    'author' => $book->getAuthor(),
                    'publication_date' => $book->getPublicationDate(),
                    'print' => $book->getPrint(),
                ];
            }
        }

        return [
            'first_name' => $customerVO->getFirstName(),
            'last_name' => $customerVO->getLastName(),
            'books' => $books ?? [],
        ];
    }
}
