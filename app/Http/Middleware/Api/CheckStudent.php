<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckStudent
{

    public function handle($request, Closure $next)
    {
        if(Auth::guard("student")->check())
        {
                return $next($request);
        }
        return  redirect()->route("api.err.auth");
    }
}
