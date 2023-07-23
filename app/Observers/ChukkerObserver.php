<?php

namespace App\Observers;

use App\Models\Chukker;
use App\Models\Invoice;
use Illuminate\Support\Facades\Auth;

class ChukkerObserver
{
    /**
     * Handle the Chukker "created" event.
     */
    public function created(Chukker $chukker): void
    {
        //
    }

    public function creating(Chukker $chukker): void
    {
        $chukker->chukker_no = $this->chukkerNumber();
        $chukker->user_id = Auth::id();
    }

    /**
     * Handle the Chukker "updated" event.
     */
    public function updated(Chukker $chukker): void
    {
        //
    }

    /**
     * Handle the Chukker "deleted" event.
     */
    public function deleted(Chukker $chukker): void
    {
        //
    }

    /**
     * Handle the Chukker "restored" event.
     */
    public function restored(Chukker $chukker): void
    {
        //
    }

    /**
     * Handle the Chukker "force deleted" event.
     */
    public function forceDeleted(Chukker $chukker): void
    {
        //
    }

    function chukkerNumber(): string
    {
        $latest = Chukker::query()->orderByDesc('id')->first();

        if (! $latest) {
            return 'CHUKKER 0001';
        }

        $string = preg_replace("/[^0-9\.]/", '', $latest->chukker_no);

        return 'CHUKKER ' . sprintf('%04d', (int) $string + 1 );
    }
}
