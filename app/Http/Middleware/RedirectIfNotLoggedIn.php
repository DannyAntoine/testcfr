<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class RedirectIfNotLoggedIn
{
   
    /*public function handle( $request, Closure $next)
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return redirect('/login'); 
    } */


     public function handle($request, Closure $next)
    {
        if (Auth::guest()) {
            return redirect('/login');
        }

        return $next($request);
    }
}
