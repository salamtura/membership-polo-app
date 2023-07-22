<?php

namespace App\Observers;

use App\Models\PenaltyCharge;
use Illuminate\Support\Facades\Auth;

class PenaltyChargeObserver
{
    /**
     * Handle the PenaltyCharge "created" event.
     */
    public function creating(PenaltyCharge $penaltyCharge): void
    {
        $penaltyCharge->user_id = Auth::id();
    }

    /**
     * Handle the PenaltyCharge "updated" event.
     */
    public function updated(PenaltyCharge $penaltyCharge): void
    {
        //
    }

    /**
     * Handle the PenaltyCharge "deleted" event.
     */
    public function deleted(PenaltyCharge $penaltyCharge): void
    {
        //
    }

    /**
     * Handle the PenaltyCharge "restored" event.
     */
    public function restored(PenaltyCharge $penaltyCharge): void
    {
        //
    }

    /**
     * Handle the PenaltyCharge "force deleted" event.
     */
    public function forceDeleted(PenaltyCharge $penaltyCharge): void
    {
        //
    }
}
