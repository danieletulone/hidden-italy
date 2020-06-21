<?php

namespace App\Exceptions\Date;

use Exception;

/**
 * @author Daniele Tulone <danieletulone.work@gmail.com>
 * @package App\Exceptions\Date
 */
class NoDayProvidedException extends Exception
{
    public function __construct()
    {
        parent::__construct("No year input provided.");
    }
}
