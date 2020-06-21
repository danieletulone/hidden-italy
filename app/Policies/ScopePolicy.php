<?php

namespace App\Policies;

use App\Models\Scope;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ScopePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any scopes.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->hasScope('read-scopes');
    }

    /**
     * Determine whether the user can view the scope.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Scope  $scope
     * @return mixed
     */
    public function view(User $user, Scope $scope)
    {
        return $user->hasScope('read-scopes');
    }

    /**
     * Determine whether the user can create scopes.
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
     * Determine whether the user can update the scope.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Scope  $scope
     * @return mixed
     */
    public function update(User $user, Scope $scope)
    {
        return $user->hasScope('update-monuments');
    }

    /**
     * Determine whether the user can delete the scope.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Scope  $scope
     * @return mixed
     */
    public function delete(User $user, Scope $scope)
    {
        return $user->hasScope('delete-monuments');
    }

    /**
     * Determine whether the user can restore the scope.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Scope  $scope
     * @return mixed
     */
    public function restore(User $user, Scope $scope)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the scope.
     * 
     * @author Daniele Tulone <danieletulone.work@gmail.com>
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Scope  $scope
     * @return mixed
     */
    public function forceDelete(User $user, Scope $scope)
    {
        //
    }
}
