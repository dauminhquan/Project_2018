<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSecretary
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
            if(Auth::guard("employ")->user()->auth == 1 || Auth::guard("employ")->user()->auth == 0)
            {
                return $next($request);
            }
        }
        return  redirect()->route("auth.login");
    }
}
