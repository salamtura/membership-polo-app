<?php

namespace App\Observers;

use App\Models\ChukkerBooking;

class ChukkerBookingObserver
{
    /**
     * Handle the ChukkerBooking "created" event.
     */
    public function created(ChukkerBooking $chukkerBooking): void
    {
        //
    }

    /**
     * Handle the ChukkerBooking "updated" event.
     */
    public function updated(ChukkerBooking $chukkerBooking): void
    {
        //
    }

    /**
     * Handle the ChukkerBooking "deleted" event.
     */
    public function deleted(ChukkerBooking $chukkerBooking): void
    {
        //
    }

    /**
     * Handle the ChukkerBooking "restored" event.
     */
    public function restored(ChukkerBooking $chukkerBooking): void
    {
        //
    }

    /**
     * Handle the ChukkerBooking "force deleted" event.
     */
    public function forceDeleted(ChukkerBooking $chukkerBooking): void
    {
        //
    }
}
