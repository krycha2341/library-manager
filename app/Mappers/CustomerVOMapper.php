<?php

namespace App\Mappers;

use App\Models\Customer;
use App\ValueObjects\CustomerVO;

class CustomerVOMapper
{
    public static function fromEloquentModel(Customer $customer, bool $withRelations = true): CustomerVO
    {
        if ($customer->books !== null && $withRelations) {
            foreach ($customer->books as $book) {
                $books[] = BookVOMapper::fromEloquentModel($book, false);
            }
        }

        return new CustomerVO(
            $customer->id,
            $customer->first_name,
            $customer->last_name,
            $customer->created_at,
            $customer->updated_at,
            $books ?? null
        );
    }
}
