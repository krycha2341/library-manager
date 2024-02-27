<?php

namespace App\Exceptions;

use Exception;

class CustomerDoesNotExistException extends Exception
{
    protected $message = 'Customer does not exist';
    protected $code = 400;
}
