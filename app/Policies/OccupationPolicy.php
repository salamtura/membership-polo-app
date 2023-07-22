<?php

namespace App\Policies;

use App\Models\User;

class OccupationPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('see.occupations');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.occupations');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.occupations');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.occupations');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.occupations');
    }
}
