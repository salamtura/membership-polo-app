<?php

namespace App\Observers;

use App\Models\Invoice;
use App\Models\Penalty;
use App\Models\PenaltyCharge;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PenaltyObserver
{
    /**
     * Handle the Penalty "created" event.
     */
    public function creating(Penalty $penalty): void
    {
        $charge = PenaltyCharge::query()->where('id','=',$penalty->penalty_charge_id)->first();
        $penalty->amount = $charge->amount;
        $penalty->status = 'pending';
        $penalty->user_id = Auth::id();

    }

    public function created(Penalty $penalty): void
    {
        Invoice::create([
            'description' => 'Penalty for ' . $penalty->penaltycharge->name,
            'invoice_date' => Carbon::today(),
            'invoice_due_date' => Carbon::today()->addDays(30),
            'invoice_type' => 'penalty',
            'payment_mode' => 'unknown',
            'remarks' => '',
            'total_amount' => $penalty->amount,
            'status' => 'unpaid',
            'penalty_id' => $penalty->id,
            'membership_id' => $penalty->membership_id,
        ]);
    }

    /**
     * Handle the Penalty "updated" event.
     */
    public function updating(Penalty $penalty): void
    {
        $charge = PenaltyCharge::query()->where('id','=',$penalty->penalty_charge_id)->first();
        $penalty->amount = $charge->amount;
        $penalty->user_id = Auth::id();
    }

    /**
     * Handle the Penalty "deleted" event.
     */
    public function deleted(Penalty $penalty): void
    {
        //
    }

    /**
     * Handle the Penalty "restored" event.
     */
    public function restored(Penalty $penalty): void
    {
        //
    }

    /**
     * Handle the Penalty "force deleted" event.
     */
    public function forceDeleted(Penalty $penalty): void
    {
        //
    }
}
