<?php

namespace App\Http\Controllers;

use App\Models\Pitch;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PitchController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index(Request $request)
    {

        if($request->ajax()) {

            $data = Pitch::whereDate('from_date', '>=', $request->start)
                ->whereDate('to_date',   '<=', $request->end)
                ->get(['id', 'description as title', 'from_date as start', 'to_date as end']);

            return response()->json($data);
        }

        return view('pitch-calendar');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */

    public function ajax(Request $request): JsonResponse
    {

        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                ]);
                return response()->json($event);
                break;
            case 'delete':
                $event = Event::find($request->id)->delete();
                return response()->json($event);
                break;
            default:
                # code...
                break;
        }

    }
}
