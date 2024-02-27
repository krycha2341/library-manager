<?php

namespace App\Repositories;

use App\DataTransferObjects\CreateCustomerDTO;
use App\ValueObjects\CustomerVO;

interface CustomersRepository
{
    /**
     * @return CustomerVO[]
     */
    public function list(): array;

    public function get(int $id): CustomerVO;

    public function create(CreateCustomerDTO $dto): CustomerVO;

    public function delete(int $id): void;
}
