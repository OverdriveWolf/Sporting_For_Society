<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsOrganizer
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if user is logged in AND has the organizer role
        if (! $request->user() || ! $request->user()->isOrganizer()) {
            abort(403, 'Unauthorized action. Only event organizers can access this page.');
        }

        return $next($request);
    }
}
