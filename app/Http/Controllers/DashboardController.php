<?php

namespace App\Http\Controllers;

use App\Models\Chukker;
use App\Models\ChukkerBooking;
use App\Models\Invoice;
use App\Models\Membership;
use App\Models\Penalty;
use App\Models\Pitch;
use App\Models\Post;
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
            'members' => Membership::all()->sortByDesc('last_login_at')->take(6),
            'pitch' => Pitch::all()->last(),
            'chukker' => $chukker,
            'booking' => ChukkerBooking::query()
                ->where('chukker_id','=',$chukker->id)
                ->where('membership_id','=',Auth::user()->membership->id)
                ->first(),
            'notices' => Post::all()->sortByDesc('id')->take(3),
            'invoices' => Invoice::query()
                ->where('status','=','unpaid')
                ->where('membership_id','=',Auth::user()->membership->id),
            'penalties' => Penalty::query()
                ->where('status','!=','served')
                ->where('membership_id','=',Auth::user()->membership->id),
        ]);
    }


}
