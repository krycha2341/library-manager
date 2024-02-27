<?php

namespace App\Exceptions;

use Exception;

class CannotReturnBookException extends Exception
{
    protected $message = 'Cannot return the book';
    protected $code = 400;
}
