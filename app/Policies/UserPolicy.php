<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        if ($user->hasRole(1)) return true;
    }

    public function index(User $user)
    {
        return $user->hasPermissionTo('user_access');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('user_create');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('user_edit');
    }

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

    public function delete(User $user)
    {
        return $user->hasPermissionTo('user_delete');
    }
}
