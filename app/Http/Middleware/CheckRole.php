<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next, ...$roles)
{
    if (!auth()->check() || !in_array(auth()->user()->role?->name, $roles)) {
        abort(403, 'Unauthorized access.');
    }
    return $next($request);
}
}
