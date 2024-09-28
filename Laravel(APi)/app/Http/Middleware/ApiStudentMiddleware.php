<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ApiStudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Perform the authentication check
        if (Auth::guard('api')->check()) {
            // Proceed to the next middleware or request handler
            return $next($request);
        }

        // Return a 401 Unauthorized response if authentication fails
        return response()->json([
            'msg' => 'You are not authorized'
        ], 401);
    }
}
