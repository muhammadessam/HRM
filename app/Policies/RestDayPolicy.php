<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestDayPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole(1)) return true;
    }

    /**
     * Determine whether the user can view any restDays.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->hasPermissionTo('restDay_access');
    }

    /**
     * Determine whether the user can view the restDay.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermissionTo('restDay_view');
    }

    /**
     * Determine whether the user can create restDays.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('restDay_create');
    }

    /**
     * Determine whether the user can update the restDay.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('restDay_edit');
    }

    /**
     * Determine whether the user can delete the restDay.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('restDay_delete');
    }
}
