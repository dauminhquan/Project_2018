<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLecturer
{

    public function handle($request, Closure $next)
    {
        if(Auth::guard("employ")->check())
        {
            if(Auth::guard("employ")->user()->auth == 2)
            {
                return $next($request);
            }
        }
        return  redirect()->route("api.err.auth");
    }
}
