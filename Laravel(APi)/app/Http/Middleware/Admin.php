<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is NOT authenticated as an admin
        if (!Auth::guard('admin')->check()) {
            // Redirect to admin login if not authenticated
            return response()->view('admin.login');
        }

        // Proceed to the next request if authenticated
        return $next($request);
    }
}
