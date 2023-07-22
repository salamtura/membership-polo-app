<?php

namespace App\Http\Controllers;

use App\Models\Membership;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class InvoiceController extends Controller
{
    public function create(): View
    {
        return view('invoices',[
            'user' => Auth::user(),
        ]);
    }
}
