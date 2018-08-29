<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)

    {
        if (Auth::check() && Auth::user()->role == 'admin'){
            return $next($request);
        }
        if (Auth::check() && Auth::user()->role == 'student'){
            return redirect()->route('home');
    }   else {
        return redirect()->route('login');
    }

    }
}
