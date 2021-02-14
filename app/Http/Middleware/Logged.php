<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Logged extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {  
        // Chequeo que el usuario haya iniado session. y me envie el header
        if (Auth::check()) {
            return $next($request);
        } 
        return response()->json(['error' => 'Usuario no autorizado'], 403);
    }
}
