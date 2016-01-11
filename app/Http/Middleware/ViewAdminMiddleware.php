<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class ViewAdminMiddleware
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
        if(!Auth::check()){
            return redirect()->guest('/auth/login');
        }

        if(!$request->user()->is('viewAdmin'))
        {
            return redirect('/notallowed/Directors');
        }

        return $next($request);
    }
}
