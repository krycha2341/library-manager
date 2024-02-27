<?php

namespace App\UI\Rest\Customers;

use App\Services\CustomersService;
use App\UI\Base;
use App\UI\Presentation\CustomerWithBooksTransformer;
use Illuminate\Http\JsonResponse;

class CustomerDetails extends Base
{
    public function __construct(readonly private CustomersService $customersService)
    {
    }

    public function __invoke(int $id): JsonResponse
    {
        $customer = $this->customersService->get($id);

        return $this->itemResponse($customer, new CustomerWithBooksTransformer());
    }
}
