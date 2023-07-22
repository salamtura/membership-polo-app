<?php

namespace App\Policies;

use App\Models\ChukkerBooking;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ChukkerBookingPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->hasPermissionTo('see.chukker bookings');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, ChukkerBooking $chukkerBooking): bool
    {
        return $user->hasPermissionTo('view.chukker bookings');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->hasPermissionTo('create.chukker bookings');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, ChukkerBooking $chukkerBooking): bool
    {
        return $user->hasPermissionTo('edit.chukker bookings');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, ChukkerBooking $chukkerBooking): bool
    {
        return $user->hasPermissionTo('delete.chukker bookings');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, ChukkerBooking $chukkerBooking): bool
    {
        return $user->hasPermissionTo('delete.chukker bookings');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, ChukkerBooking $chukkerBooking): bool
    {
        return $user->hasPermissionTo('delete.chukker bookings');
    }
}
