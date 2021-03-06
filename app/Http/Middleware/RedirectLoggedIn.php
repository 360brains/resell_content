<?php

namespace App\Http\Middleware;

use Closure;

class RedirectLoggedIn
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
        if (!is_null(auth()->user())) {
            return redirect(route('user.dashboard'));
        }
        return $next($request);
    }
}
