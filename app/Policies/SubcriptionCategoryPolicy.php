<?php

namespace App\Policies;

use App\Models\User;

class SubcriptionCategoryPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('see.subscription categories');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.subscription categories');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.subscription categories');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.subscription categories');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.subscription categories');
    }
}
