<?php

namespace App\UI\Rest\Customers;

use App\DataTransferObjects\CreateCustomerDTO;
use App\Requests\CreateCustomerRequest;
use App\Services\CustomersService;
use App\UI\Base;
use App\UI\Presentation\CustomerTransformer;
use Illuminate\Http\JsonResponse;

class CreateCustomer extends Base
{
    public function __construct(readonly private CustomersService $customersService)
    {
    }

    public function __invoke(CreateCustomerRequest $request): JsonResponse
    {
        $customer = $this->customersService->create(new CreateCustomerDTO(
            $request->get('first_name'),
            $request->get('last_name')
        ));

        return $this->itemResponse($customer, new CustomerTransformer());
    }
}
