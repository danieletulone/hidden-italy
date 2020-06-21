<?php

namespace App\Helpers;

class AuthHelper
{

    /**
     * Get the id of current user or zero.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return int
     */
    public static function id(): int
    {
        return auth()->user() ? auth()->user()->id : null;
    }
}