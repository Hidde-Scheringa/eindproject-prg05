<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect('/')->with('error', 'Je moet ingelogd zijn om deze pagina te bekijken.');
        }

        if (!auth()->user()->isAdmin()) {
            return redirect('/games')->with('error', 'Je hebt niet de rechten voor deze pagina');
        }
        return $next($request);
    }

}
