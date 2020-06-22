<?php

namespace App\Traits\Requests;

use Str;

trait HasCrudScope
{
    use MustBeSameUser;

    /**
     * Check if current user can manage the resource
     * also when is not she/he the owner.
     *
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     * 
     * @return boolean
     */
    public function canManage()
    {
        if ($user = auth()->user()) {
            return $user->hasScope('manage-' . $this->getResource());
        }

        return false;
    }

    /**
     * Undocumented function
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @return void
     */
    public function getResource()
    {
        return Str::plural(
            Str::replaceFirst(
                'request', 
                '', 
                Str::lower(class_basename($this))
            )
        );
    }

    /**
     * Undocumented function
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param [type] $name
     * @return boolean
     */
    public function hasCrudScope($key = 'id', $resource = null)
    {
        if ($resource == null) {
            $resource = $this->getResource();
        }

        if (auth()->check()) {
            if ($this->$key) {
                return auth()->user()->hasScope('update-' . $resource) && $this->isSame();
            } else {
                return auth()->user()->hasScope('create-' . $resource);
            }
        }

        return false;
    }
}