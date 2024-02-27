<?php

namespace App\DataTransferObjects;

class CreateCustomerDTO
{
    public function __construct(
        readonly private string $firstName,
        readonly private string $lastName
    ) {
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}
