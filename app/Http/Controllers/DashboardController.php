<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use App\Models\Pitch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function create(): View
    {
        return view('dashboard',[
            'user' => Auth::user(),
            'members' => Membership::all(),
            'pitch' => Pitch::all()->last(),
        ]);
    }
}
