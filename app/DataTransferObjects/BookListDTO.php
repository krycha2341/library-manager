<?php

namespace App\DataTransferObjects;

class BookListDTO
{
    public function __construct(
        readonly private int $limit,
        readonly private int $offset,
        readonly private ?string $title = null,
        readonly private ?string $author = null,
        readonly private ?string $customerFirstName = null,
        readonly private ?string $customerLastName = null
    ) {
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function getCustomerFirstName(): ?string
    {
        return $this->customerFirstName;
    }

    public function getCustomerLastName(): ?string
    {
        return $this->customerLastName;
    }
}
