<?php

namespace App\Policies;

use App\Models\Role;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any roles.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasScope('read-roles');
    }

    /**
     * Determine whether the user can view the role.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->hasScope('read-roles');
    }

    /**
     * Determine whether the user can create roles.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasScope('create-roles');
    }

    /**
     * Determine whether the user can update the role.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function update(User $user, Role $role)
    {
        return $user->hasScope('update-roles');
    }

    /**
     * Determine whether the user can delete the role.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function delete(User $user, Role $role)
    {
        return $user->hasScope('delete-roles');
    }

    /**
     * Determine whether the user can restore the role.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function restore(User $user, Role $role)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the role.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Role  $role
     * @return mixed
     */
    public function forceDelete(User $user, Role $role)
    {
        //
    }
}
