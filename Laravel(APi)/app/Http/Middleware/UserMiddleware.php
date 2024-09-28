<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard(name: 'user')->check()) {
            // Redirect to admin login if not authenticated
            return response()->view('admin.login');
        }

        // Proceed to the next request if authenticated
        return $next($request);

        // Proceed to the next request if authenticated
    }
}
