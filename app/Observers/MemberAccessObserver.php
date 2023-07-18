<?php

namespace App\Observers;

use App\Models\MemberAccess;
use Illuminate\Support\Facades\Auth;

class MemberAccessObserver
{
    /**
     * Handle the MemberAccess "created" event.
     */
    public function creating(MemberAccess $memberAccess): void
    {
        $user = Auth::user();
        $memberAccess->created_by = $user->id;
        $memberAccess->access_code = $user->id.random_int(100000, 999999);
    }

    /**
     * Handle the MemberAccess "updated" event.
     */
    public function updating(MemberAccess $memberAccess): void
    {
        $user = Auth::user();
        $memberAccess->updated_by = $user->id;
    }

    /**
     * Handle the MemberAccess "deleted" event.
     */
    public function deleted(MemberAccess $memberAccess): void
    {
        //
    }

    /**
     * Handle the MemberAccess "restored" event.
     */
    public function restored(MemberAccess $memberAccess): void
    {
        //
    }

    /**
     * Handle the MemberAccess "force deleted" event.
     */
    public function forceDeleted(MemberAccess $memberAccess): void
    {
        //
    }
}
