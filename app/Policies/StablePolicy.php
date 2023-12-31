<?php

namespace App\Policies;

use App\Models\User;

class StablePolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('see.stables');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.stables');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.stables');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.stables');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.stables');
    }
}
