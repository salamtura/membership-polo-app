<?php

namespace App\Policies;

use App\Models\Pitch;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PitchPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('see.pitches');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Pitch $pitch): bool
    {
        return $user->hasPermissionTo('view.pitches');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create.pitches');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Pitch $pitch): bool
    {
        return $user->hasPermissionTo('edit.pitches');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Pitch $pitch): bool
    {
        return $user->hasPermissionTo('delete.pitches');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Pitch $pitch): bool
    {
        return $user->hasPermissionTo('delete.pitches');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Pitch $pitch): bool
    {
        return $user->hasPermissionTo('delete.pitches');
    }
}
