<?php

namespace App\Policies;

use App\User;
use App\UsedVacation;
use Illuminate\Auth\Access\HandlesAuthorization;

class UsedVacationPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole(1)) return true;
    }

    /**
     * Determine whether the user can view the used vacation.
     *
     * @param \App\User $user
     * @param \App\User $viewedUser
     * @return mixed
     */
    public function view(User $user, User $viewedUser)
    {
        if ($user->id === $viewedUser->id) return true;

        if (!$user->hasPermissionTo('user_view')) return false;

        if ($user->hasPermissionTo('user_access')) {
            if ($user->hasRole(3))
                return $user->departments()->where('departments.id', $viewedUser->department->id)->exists();

            return true;
        }

        return false;
    }

    /**
     * Determine whether the user can create used vacations.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('usedVacation_create');
    }

    /**
     * Determine whether the user can update the used vacation.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('usedVacation_edit');
    }

    /**
     * Determine whether the user can delete the used vacation.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->hasPermissionTo('usedVacation_delete');
    }
}
