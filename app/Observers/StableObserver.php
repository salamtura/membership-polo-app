<?php

namespace App\Observers;

use App\Models\Stable;
use Illuminate\Support\Facades\Auth;

class StableObserver
{
    /**
     * Handle the Stable "created" event.
     */
    public function created(Stable $stable): void
    {
        //
    }

    /**
     * Handle the Stable "updated" event.
     */
    public function updated(Stable $stable): void
    {
        //
    }

    /**
     * Handle the Stable "deleted" event.
     */
    public function deleted(Stable $stable): void
    {
        //
    }

    /**
     * Handle the Stable "restored" event.
     */
    public function restored(Stable $stable): void
    {
        //
    }

    /**
     * Handle the Stable "force deleted" event.
     */
    public function forceDeleted(Stable $stable): void
    {
        //
    }
}
