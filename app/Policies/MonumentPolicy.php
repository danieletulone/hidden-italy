<?php

namespace App\Policies;

use App\Models\User;
use App\Monument;
use Illuminate\Auth\Access\HandlesAuthorization;

class MonumentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any monuments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the monument.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Monument  $monument
     * @return mixed
     */
    public function view(User $user, Monument $monument)
    {
        //
    }

    /**
     * Determine whether the user can create monuments.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the monument.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Monument  $monument
     * @return mixed
     */
    public function update(User $user, Monument $monument)
    {
        //
    }

    /**
     * Determine whether the user can delete the monument.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Monument  $monument
     * @return mixed
     */
    public function delete(User $user, Monument $monument)
    {
        //
    }

    /**
     * Determine whether the user can restore the monument.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Monument  $monument
     * @return mixed
     */
    public function restore(User $user, Monument $monument)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the monument.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Monument  $monument
     * @return mixed
     */
    public function forceDelete(User $user, Monument $monument)
    {
        //
    }
}
