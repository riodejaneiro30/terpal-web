<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/'); // Redirect to landing page if not authenticated
        }

        // Add additional authorization logic here if needed
        // For example, check if the user has a specific role or permission
        // if (!Auth::user()->hasRole('admin')) {
        //     return redirect('/'); // Redirect to landing page if not authorized
        // }

        return $next($request);
    }
}
