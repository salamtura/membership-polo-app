<?php

namespace App\Policies;

use App\Models\User;

class ProfessionPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('see.professions');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.professions');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.professions');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.professions');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.professions');
    }
}
