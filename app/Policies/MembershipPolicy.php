<?php

namespace App\Policies;

use App\Models\User;

class MembershipPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('see.memberships');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.memberships');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.memberships');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.memberships');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.memberships');
    }
}
