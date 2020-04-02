<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PointingPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole(1)) return true;
    }

    /**
     * Determine whether the user can view the pointing.
     *
     * @param \App\User $user
     * @param \App\User $viewedUsed
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
     * Determine whether the user can create pointings.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->hasPermissionTo('pointing_create');
    }

    /**
     * Determine whether the user can update the pointing.
     *
     * @param \App\User $user
     * @return mixed
     */
    public function update(User $user)
    {
        return $user->hasPermissionTo('pointing_edit');
    }
}
