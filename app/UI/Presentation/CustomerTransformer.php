<?php

namespace App\UI\Presentation;

use App\ValueObjects\CustomerVO;
use League\Fractal\TransformerAbstract;

class CustomerTransformer extends TransformerAbstract
{
    public function transform(CustomerVO $customerVO): array
    {
        return [
            'first_name' => $customerVO->getFirstName(),
            'last_name' => $customerVO->getLastName(),
        ];
    }
}
