<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class VerifyAdmin
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
        //判断是否登陆,如未登录则重定向到登陆页
        if(empty(Session::get('admin'))) {
            return redirect('/login');
        }

        //如已登陆则执行下一步
        return $next($request);
    }
}
