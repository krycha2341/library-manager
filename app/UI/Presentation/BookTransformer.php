<?php

namespace App\UI\Presentation;

use App\ValueObjects\BookVO;
use League\Fractal\TransformerAbstract;

class BookTransformer extends TransformerAbstract
{
    public function transform(BookVO $bookVO): array
    {
        return [
            'title' => $bookVO->getTitle(),
            'author' => $bookVO->getAuthor(),
            'publication_date' => $bookVO->getPublicationDate(),
            'print' => $bookVO->getPrint(),
            'status' => $bookVO->getStatus()->value,
            'customer' => [
                'first_name' => $bookVO->getCustomerVO()?->getFirstName(),
                'last_name' => $bookVO->getCustomerVO()?->getLastName(),
            ]
        ];
    }
}
