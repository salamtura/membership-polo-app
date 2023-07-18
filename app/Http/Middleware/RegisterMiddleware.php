<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $routes = ["faq", "support", "help"];
        $route = $request->route('accesskey');

        // Redirect to custom page if it doesn't relate to a profile
        if (in_array($route, $routes)) {
            return new Response(view($route));
        }

        return $next($request);
    }
}
