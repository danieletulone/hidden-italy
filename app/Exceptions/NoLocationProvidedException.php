<?php

namespace App\Exceptions;

use Exception;

class NoLocationProvidedException extends Exception
{
    public function __construct()
    {
        parent::__construct("Cannot find resouce with a start location point.");
    }
}
