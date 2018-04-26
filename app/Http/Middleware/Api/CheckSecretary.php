<?php

namespace App\Http\Middleware\Api;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckSecretary
{

    public function handle($request, Closure $next)
    {
        if(Auth::guard("employ")->check())
        {
            if(Auth::guard("employ")->user()->auth == 1)
            {
                return $next($request);
            }
        }
        return  redirect()->route("api.err.auth");
    }
}
