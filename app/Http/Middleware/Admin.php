<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Auth\Middleware\Role as Middleware;

use Illuminate\Support\Facades\Auth;

class Admin
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
            // Obtengo el usuario desde la session 
            $user = Auth::user();
            if($user->role == 'admin') {
                return $next($request);
            }
        } 
        return response()->json(['error' => 'Usuario no autorizado'], 403);
    }
}
