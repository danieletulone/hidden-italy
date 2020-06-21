<?php

namespace App\Policies;

use App\Models\Monument;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MonumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any monuments.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasScope('read-monuments');
    }

    /**
     * Determine whether the user can view the monument.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monument  $monument
     * @return mixed
     */
    public function view(User $user, Monument $monument)
    {
        return $user->hasScope('read-monuments');
    }

    /**
     * Determine whether the user can create monuments.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasScope('create-monuments');
    }

    /**
     * Determine whether the user can update the monument.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monument  $monument
     * @return mixed
     */
    public function update(User $user, Monument $monument)
    {
        return $user->hasScope('update-monuments');
    }

    /**
     * Determine whether the user can delete the monument.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monument  $monument
     * @return mixed
     */
    public function delete(User $user, Monument $monument)
    {
        return $user->hasScope('delete-monuments');
    }

    /**
     * Determine whether the user can restore the monument.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monument  $monument
     * @return mixed
     */
    public function restore(User $user, Monument $monument)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the monument.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Monument  $monument
     * @return mixed
     */
    public function forceDelete(User $user, Monument $monument)
    {
        //
    }
}
