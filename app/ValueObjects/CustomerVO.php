<?php

namespace App\ValueObjects;

use Carbon\Carbon;

class CustomerVO
{
    /**
     * @param BookVO[]|null $books
     */
    public function __construct(
        readonly private int $id,
        readonly private string $firstName,
        readonly private string $lastName,
        readonly private ?Carbon $createdAt,
        readonly private ?Carbon $updatedAt,
        readonly private ?array $books
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function getCreatedAt(): ?Carbon
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    /**
     * @return BookVO[]|null
     */
    public function getBooks(): ?array
    {
        return $this->books;
    }
}
