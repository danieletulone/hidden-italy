<?php

namespace App\Exceptions;

use Exception;

class DateNotValidException extends Exception
{
    public function __construct()
    {
        parent::__construct("The provided date is not valid. Please check inputs.");
    }
}
