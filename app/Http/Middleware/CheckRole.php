<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (!Auth::check() || !$request->user()->hasRole($role)) {
            abort(403, 'Accès refusé.'); // ou redirige vers une page spécifique
        }

        return $next($request);
    }
}
