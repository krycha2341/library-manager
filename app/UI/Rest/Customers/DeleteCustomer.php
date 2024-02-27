<?php

namespace App\UI\Rest\Customers;

use App\Exceptions\CannotDeleteCustomerException;
use App\Services\CustomersService;
use App\UI\Base;
use Illuminate\Http\JsonResponse;

class DeleteCustomer extends Base
{
    public function __construct(readonly private CustomersService $customersService)
    {
    }

    /**
     * @throws CannotDeleteCustomerException
     */
    public function __invoke(int $id): JsonResponse
    {
        $this->customersService->delete($id);

        return $this->emptyResponse();
    }
}
