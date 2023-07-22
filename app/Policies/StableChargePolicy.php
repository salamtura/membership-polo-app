<?php

namespace App\Policies;

use App\Models\Stable;
use App\Models\StableCharge;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class StableChargePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('see.stable charges');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, StableCharge $stableCharge): bool
    {
        return $user->hasPermissionTo('view.stable charges');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        $stables = StableCharge::all()->count();
        if($stables > 0 ){
            return false;
        }
        return $user->hasPermissionTo('create.stable charges');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, StableCharge $stableCharge): bool
    {
        return $user->hasPermissionTo('edit.stable charges');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, StableCharge $stableCharge): bool
    {
        return $user->hasPermissionTo('delete.stable charges');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, StableCharge $stableCharge): bool
    {
        return $user->hasPermissionTo('delete.stable charges');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, StableCharge $stableCharge): bool
    {
        return $user->hasPermissionTo('delete.stable charges');
    }
}
