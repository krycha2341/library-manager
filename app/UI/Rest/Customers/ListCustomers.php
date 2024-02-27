<?php

namespace App\UI\Rest\Customers;

use App\Services\CustomersService;
use App\UI\Base;
use App\UI\Presentation\CustomerTransformer;
use Illuminate\Http\JsonResponse;

class ListCustomers extends Base
{
    public function __construct(readonly private CustomersService $customersService)
    {
    }

    public function __invoke(): JsonResponse
    {
        $customers = $this->customersService->list();

        return $this->collectionResponse($customers, new CustomerTransformer());
    }
}
