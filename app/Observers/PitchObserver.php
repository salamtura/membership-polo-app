<?php

namespace App\Observers;

use App\Models\Pitch;
use Illuminate\Support\Facades\Auth;

class PitchObserver
{
    /**
     * Handle the Pitch "created" event.
     */
    public function created(Pitch $pitch): void
    {
        //
    }

    public function creating(Pitch $pitch): void
    {
        $pitch->user_id = Auth::id();
    }

    /**
     * Handle the Pitch "updated" event.
     */
    public function updated(Pitch $pitch): void
    {
        //
    }

    /**
     * Handle the Pitch "deleted" event.
     */
    public function deleted(Pitch $pitch): void
    {
        //
    }

    /**
     * Handle the Pitch "restored" event.
     */
    public function restored(Pitch $pitch): void
    {
        //
    }

    /**
     * Handle the Pitch "force deleted" event.
     */
    public function forceDeleted(Pitch $pitch): void
    {
        //
    }
}
