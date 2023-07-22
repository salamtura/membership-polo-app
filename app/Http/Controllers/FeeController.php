<?php

namespace App\Http\Controllers;

use App\Models\MembershipCategory;
use App\Models\PenaltyCharge;
use App\Models\StableCharge;
use App\Models\SubscriptionCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class FeeController extends Controller
{
    public function create(): View
    {
        return view('fee',[
            'user' => Auth::user(),
            'membershipfees' => MembershipCategory::all(),
            'subscription' => SubscriptionCategory::all(),
            'penalty' => PenaltyCharge::all(),
            'stable' => StableCharge::all(),
        ]);
    }
}
