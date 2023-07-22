<?php

namespace App\Policies;

use App\Models\User;

class SubcriptionPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('see.subscriptions');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.subscriptions');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.subscriptions');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.subscriptions');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.subscriptions');
    }
}
