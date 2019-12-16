<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LogoutInactiveUser
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
            if (!auth()->user()->active){
                Auth::logout();
                return redirect()->route('login')->with("error", "You can not login because your account is deactivated due to certain reasons.");
            }
        }
        return $next($request);
    }
}
