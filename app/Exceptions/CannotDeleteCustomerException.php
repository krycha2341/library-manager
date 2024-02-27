<?php

namespace App\Exceptions;

use Exception;

class CannotDeleteCustomerException extends Exception
{
    protected $message = 'Cannot delete customer - check borrowed books';
    protected $code = 400;
}
