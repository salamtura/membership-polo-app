<?php

namespace App\Policies;

use App\Models\Chukker;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChukkerPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('see.chukkers');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Chukker $chukker): bool
    {
        return $user->hasPermissionTo('view.chukkers');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create.chukkers');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Chukker $chukker): bool
    {
        return $user->hasPermissionTo('edit.chukkers');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Chukker $chukker): bool
    {
        return $user->hasPermissionTo('delete.chukkers');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Chukker $chukker): bool
    {
        return $user->hasPermissionTo('delete.chukkers');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Chukker $chukker): bool
    {
        return $user->hasPermissionTo('delete.chukkers');
    }
}
