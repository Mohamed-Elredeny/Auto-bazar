<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class host
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
        if (!Session::get('host')) {
            Session::put('host','http://127.0.0.1:8000');
        }
        return $next($request);
    }
}
