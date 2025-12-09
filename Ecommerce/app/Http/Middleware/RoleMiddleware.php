<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is authenticated
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized - Please log in');
        }

        // Check if authenticated user has admin role
        if ($user->role !== 'admin') {
            abort(403, 'Unauthorized - Admin access required');
        }

        return $next($request);
    }
}
