<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MemberAccess;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetAccessController  extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.getaccess');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function autocomplete(Request $request)
    {
        $str = $request->get('query');

        $data = MemberAccess::query()
            ->where("name","LIKE","%{$str}%")
            ->get(["name","mobile"]);

        return response()->json($data);
    }
}
