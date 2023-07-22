<?php

namespace App\Policies;

use App\Models\User;

class UserPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('see.users');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.users');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.users');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.users');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.users');
    }
}
