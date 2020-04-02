<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class SpecialtyPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole(1)) return true;
    }

    /**
     * Determine whether the user can view any specialtys.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->hasPermissionTo('specialty_access');
    }

    /**
     * Determine whether the user can view the specialty.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermissionTo('specialty_view');
    }

    /**
     * Determine whether the user can create specialtys.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('specialty_create');
    }

    /**
     * Determine whether the user can update the specialty.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('specialty_edit');
    }

    /**
     * Determine whether the user can delete the specialty.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('specialty_delete');
    }
}
