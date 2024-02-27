<?php

namespace App\Exceptions;

use Exception;

class CannotBorrowBookException extends Exception
{
    protected $message = 'Cannot borrow the book';
    protected $code = 400;
}
