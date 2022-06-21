<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class setCountry
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
        if (!Session::get('country')) {
            if (Auth::user()) {
                Session::put('country',Auth::user()->city_id);
            }
            Session::put('country',0);
        }
        return $next($request);
    }
}
