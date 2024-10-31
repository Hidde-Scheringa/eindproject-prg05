<?php

namespace App\Http\Middleware;

use App\Models\Game;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserCanEdit
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

            $postCount = Game::where('user_id', auth()->id())->where('verified', true)->count();

            if ($postCount < 5 && $request->is('games/*/edit')) {
                return redirect('/games')->with('error', 'Je hebt niet de rechten voor deze pagina');
            }


        return $next($request);
    }
}
