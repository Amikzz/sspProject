<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if the authenticated user has 'admin' or 'sadmin' role
        if (Auth::check() && (Auth::user()->userType == 'admin' || Auth::user()->userType == 'sadmin')) {
            return $next($request);
        }

        // If not an admin, return a 403 Forbidden response
        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
