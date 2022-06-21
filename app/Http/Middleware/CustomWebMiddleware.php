<?php

namespace App\Http\Middleware;

use Closure;

class CustomWebMiddleware
{
    public function handle($request, Closure $next)
    {
        /*
        $customGuard = 'custom-guard-name-goes-here';
        if (auth($customGuard)->check()) {
            config()->set('auth.defaults.guard', $customGuard);
        }
        */
        // if you have multiple guards you may use this foreach to ease your work.
        $guards = config('auth.guards');
        foreach ($guards as $guardName => $guard) {
            if ($guard['driver'] == 'session' && auth($guardName)->check()) {
                config()->set('auth.defaults.guard', $guardName);
            }
        }

        return $next($request);
    }

}
