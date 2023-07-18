<?php

namespace App\Policies;

use App\Models\User;

class MemberAccessPolicy
{
    public function viewAny(User $user)
    {
        return $user->hasPermissionTo('view.member accesses');
    }

    public function view(User $user)
    {
        return $user->hasPermissionTo('view.member accesses');
    }

    public function create(User $user)
    {
        return $user->hasPermissionTo('create.member accesses');
    }

    public function update(User $user)
    {
        return $user->hasPermissionTo('edit.member accesses');
    }

    public function delete(User $user)
    {
        return $user->hasPermissionTo('delete.member accesses');
    }
}
