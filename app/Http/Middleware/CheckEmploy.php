<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmploy
{
    public function handle($request, Closure $next)
    {
        if(Auth::guard("employ")->check())
        {
            return $next($request);
        }
        return  redirect()->route("auth.login");
    }
}
