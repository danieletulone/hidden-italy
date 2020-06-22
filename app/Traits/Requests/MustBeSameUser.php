<?php

namespace App\Traits\Requests;

trait MustBeSameUser
{

    /**
     * Check if current user is the owner of resource.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param string $property
     * @return boolean
     */
    public function isSame($property = "user_id")
    {
        return auth()->user()->id == $this->$property;
    }
}