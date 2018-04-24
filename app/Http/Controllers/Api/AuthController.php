<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\AuthRequest;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class AuthController extends Controller
{

    public function login(AuthRequest $request)
    {
        if (Auth::guard("student")->attempt(['code' => $request->input("username"), 'password' => $request->input("password")], $request->input("remember")) ||
            Auth::guard("employ")->attempt(['email' => $request->input("username"), 'password' => $request->input("password")], $request->input("remember"))
        ) {
            if(Auth::guard("student")->check())
            {
                return Auth::guard("student")->user();
            }
            if(Auth::guard("employ")->check())
            {
                return Auth::guard("employ")->user();
            }
            return Response::json(array(
                'code'      =>  200,
                'message'   =>  "Đăng nhập thành công"
            ), 200);
        }

        return Response::json(array(
            'code'      =>  401,
            'message'   =>  "Tài khoản, mật khẩu không tồn tại"
        ), 401);
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
        return Response::json(array(
            'code'      =>  200,
            'message'   =>  "Đăng nhập thành công"
        ), 200);
    }



}
