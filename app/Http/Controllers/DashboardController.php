<?php

namespace App\Http\Controllers;

use App\Models\Chukker;
use App\Models\ChukkerBooking;
use App\Models\Invoice;
use App\Models\Membership;
use App\Models\Penalty;
use App\Models\Pitch;
use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{

    public function create(): View
    {
        $today = Carbon::today();
        $chukker = Chukker::query()
            ->where('chukker_date','>=',$today)
            ->orderBy('id')->first();

        if($chukker == null){
            $chukker = Chukker::query()
                ->orderByDesc('id')->first();
        }

        $pitch = Pitch::query()
            ->where('from_date','<=',$today)
            ->where('to_date','>=',$today)
            ->first();

        if ($pitch == null){
            $pitch = Pitch::query()
                ->orderByDesc('id')
                ->first();
        }

        return view('dashboard',[
            'user' => Auth::user(),
            'members' => Membership::all()->sortByDesc('last_login_at')->take(6),
            'pitch' => $pitch,
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
