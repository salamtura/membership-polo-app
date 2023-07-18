<?php

namespace App\Http\Middleware;

use App\Models\Membership;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use function PHPUnit\Framework\isEmpty;

class MemberMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if(Auth::user()->hasPermissionTo('view.member') ){
                    $membership = Membership::all()->where('user_id','=',Auth::user()->id);
                    if($membership->first() && $membership->get('membership_status') != 'pending'){
                        return $next($request);
                    }
                    return redirect('wizard');
                }
                return  abort(403);
            }
        }

        return $next($request);
    }
}
