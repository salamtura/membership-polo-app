<?php

namespace App\Observers;

use App\Models\StableCharge;
use Illuminate\Support\Facades\Auth;

class StableChargeObserver
{
    /**
     * Handle the StableCharge "created" event.
     */
    public function created(StableCharge $stableCharge): void
    {
        //
    }

    public function creating(StableCharge $stableCharge): void
    {
        $stableCharge->user_id = Auth::id();
    }

    /**
     * Handle the StableCharge "updated" event.
     */
    public function updated(StableCharge $stableCharge): void
    {
        //
    }

    /**
     * Handle the StableCharge "deleted" event.
     */
    public function deleted(StableCharge $stableCharge): void
    {
        //
    }

    /**
     * Handle the StableCharge "restored" event.
     */
    public function restored(StableCharge $stableCharge): void
    {
        //
    }

    /**
     * Handle the StableCharge "force deleted" event.
     */
    public function forceDeleted(StableCharge $stableCharge): void
    {
        //
    }
}
