<?php

namespace App\Repositories\Implementations;

use App\DataTransferObjects\CreateCustomerDTO;
use App\Mappers\CustomerVOMapper;
use App\Models\Customer;
use App\Repositories\CustomersRepository;
use App\ValueObjects\CustomerVO;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EloquentCustomersRepository implements CustomersRepository
{
    public function list(): array
    {
        $customerModels = Customer::query()->get();

        /** @var Customer $customer */
        foreach ($customerModels as $customer) {
            $customers[] = CustomerVOMapper::fromEloquentModel($customer);
        }

        return $customers ?? [];
    }

    public function get(int $id): CustomerVO
    {
        /** @var Customer $customer */
        $customer = Customer::query()->where('id', $id)
            ->first();

        if ($customer === null) {
            throw new ModelNotFoundException();
        }

        return CustomerVOMapper::fromEloquentModel($customer);
    }

    public function create(CreateCustomerDTO $dto): CustomerVO
    {
        /** @var Customer $customerModel */
        $customerModel = Customer::query()->create([
            'first_name' => $dto->getFirstName(),
            'last_name' => $dto->getLastName(),
        ]);

        return CustomerVOMapper::fromEloquentModel($customerModel);
    }

    public function delete(int $id): void
    {
        Customer::query()->where('id', $id)->delete();
    }
}
