<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class VacationPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole(1)) return true;
    }

    /**
     * Determine whether the user can view any vacations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function index(User $user)
    {
        return $user->hasPermissionTo('vacation_access');
    }

    /**
     * Determine whether the user can view the vacation.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->hasPermissionTo('vacation_view');
    }

    /**
     * Determine whether the user can create vacations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('vacation_create');
    }

    /**
     * Determine whether the user can update the vacation.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('vacation_edit');
    }

    /**
     * Determine whether the user can delete the vacation.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('vacation_delete');
    }
}
