<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    // 登陆
    public function login(Request $request){
        dd('登陆');
    }


    // 注册
    public function register(Request $request){
        dd('注册');
    }


    // 退出登录
    public function outlog(Request $request){
        dd('退出登录');
    }



}
