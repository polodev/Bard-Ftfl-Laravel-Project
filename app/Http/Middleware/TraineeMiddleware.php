<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class TraineeMiddleware
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

        if(!$request->user()->is('trainee'))
        {
            return redirect('/notallowed/Trainee');
        }

        return $next($request);
    }
}
