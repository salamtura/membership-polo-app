<?php

namespace App\Http\Controllers;

use App\Models\Chukker;
use App\Models\ChukkerBooking;
use App\Models\Membership;
use App\Models\Pitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function create(): View
    {
        $chukker = Chukker::query()->orderByDesc('id')->first();

        return view('dashboard',[
            'user' => Auth::user(),
            'members' => Membership::all(),
            'pitch' => Pitch::all()->last(),
            'chukker' => $chukker,
            'booking' => ChukkerBooking::query()
                ->where('chukker_id','=',$chukker->id)
                ->where('membership_id','=',Auth::user()->membership->id)
                ->first(),
        ]);
    }


}
