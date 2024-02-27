<?php

namespace App\ValueObjects;

use App\Enums\BookStatus;
use Carbon\Carbon;

class BookVO
{
    public function __construct(
        readonly private int $id,
        readonly private string $title,
        readonly private string $author,
        readonly private int $publicationDate,
        readonly private string $print,
        private BookStatus $status,
        readonly private ?Carbon $createdAt,
        readonly private ?Carbon $updatedAt,
        private ?CustomerVO $customerVO
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getPublicationDate(): int
    {
        return $this->publicationDate;
    }

    public function getStatus(): BookStatus
    {
        return $this->status;
    }

    public function setStatus(BookStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public function getCustomerVO(): ?CustomerVO
    {
        return $this->customerVO;
    }

    public function setCustomerVO(?CustomerVO $customerVO): self
    {
        $this->customerVO = $customerVO;

        return $this;
    }

    public function getPrint(): string
    {
        return $this->print;
    }
}
