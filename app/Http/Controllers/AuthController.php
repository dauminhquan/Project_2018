<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function login()
    {
        if (Auth::guard("student")->check() || Auth::guard("employ")->check())
        {
            return  redirect()->route("home");
        }
        return view("login");
    }
    public function logout()
    {
        if(Auth::guard("student")->check())
        {

            Auth::guard("student")->logout();
        }
        if(Auth::guard("employ")->check())
        {

            Auth::guard("employ")->logout();
        }
        return  redirect()->route("auth.login");
    }
}
