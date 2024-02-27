<?php

namespace App\Services;

use App\DataTransferObjects\CreateCustomerDTO;
use App\Exceptions\CannotDeleteCustomerException;
use App\Repositories\CustomersRepository;
use App\ValueObjects\CustomerVO;

class CustomersService
{
    public function __construct(readonly private CustomersRepository $customersRepository)
    {
    }

    public function list(): array
    {
        return $this->customersRepository->list();
    }

    public function get(int $id): CustomerVO
    {
        return $this->customersRepository->get($id);
    }

    public function create(CreateCustomerDTO $dto): CustomerVO
    {
        return $this->customersRepository->create($dto);
    }

    /**
     * @throws CannotDeleteCustomerException
     */
    public function delete(int $id): void
    {
        $customer = $this->get($id);
        if ($customer->getBooks() !== null) {
            throw new CannotDeleteCustomerException();
        }

        $this->customersRepository->delete($id);
    }
}
