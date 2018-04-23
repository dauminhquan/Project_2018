<?php

namespace App\Http\Middleware;

use Closure;

class Employ
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
        if(Auth::guard("employ")->check())
        {
            return $next($request);
        }
        return ["auth" => false];
    }
}
