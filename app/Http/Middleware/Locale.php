<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;


class Locale
{

    public function handle($request, Closure $next)
    {
        $n = $next($request);

        if (Session::has('locale')) {
            App::setLocale(Session::get('locale'));
        }

        return $n;
    }
}
