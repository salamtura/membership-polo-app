<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class MembersController extends Controller
{
    public function index(): View
    {
        return view('members',[
            'user' => Auth::user(),
            'members' => Membership::all(),
        ]);
    }
}
