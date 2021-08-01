<?php

namespace App\Http\Middleware;
use Auth;
use Redirect;
use Closure;

class FilterRole
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
        if(Auth::user() && Auth::user()->role == 'admin'){
            return $next($request);
        }
        abort(403);
    }
}
