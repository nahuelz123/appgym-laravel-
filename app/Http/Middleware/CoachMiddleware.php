<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
class CoachMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'coach') {
            return $next($request);
        }

        return redirect('/')->with('error', 'No tienes acceso a esta sección.');
    }
}
