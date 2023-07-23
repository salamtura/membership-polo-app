<?php

namespace App\Observers;

use App\Models\Document;
use Illuminate\Support\Facades\Auth;

class DocumentObserver
{
    /**
     * Handle the Document "created" event.
     */
    public function creating(Document $document): void
    {
        $document->user_id = Auth::id();
    }

    /**
     * Handle the Document "updated" event.
     */
    public function updated(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "deleted" event.
     */
    public function deleted(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "restored" event.
     */
    public function restored(Document $document): void
    {
        //
    }

    /**
     * Handle the Document "force deleted" event.
     */
    public function forceDeleted(Document $document): void
    {
        //
    }
}
