<?php

namespace App\Policies;

use App\Models\PenaltyCharge;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class PenaltyChargePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('see.penalty charges');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, PenaltyCharge $penaltyCharge): bool
    {
        return $user->hasPermissionTo('view.penalty charges');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create.penalty charges');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, PenaltyCharge $penaltyCharge): bool
    {
        return $user->hasPermissionTo('edit.penalty charges');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, PenaltyCharge $penaltyCharge): bool
    {
        return $user->hasPermissionTo('delete.penalty charges');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, PenaltyCharge $penaltyCharge): bool
    {
        return $user->hasPermissionTo('delete.penalty charges');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, PenaltyCharge $penaltyCharge): bool
    {
        return $user->hasPermissionTo('delete.penalty charges');
    }
}
