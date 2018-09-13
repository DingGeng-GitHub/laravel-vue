<?php
/**
 * Created by PhpStorm.
 * User: ding
 * Date: 2018/9/13
 * Time: 17:00
 */

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//路由前缀 就是讲此分组中的所有路由路径前加个前缀
    Route::group(['prefix' => 'login'],function(){

        // 注册
        Route::get('/register','Admin\LoginController@register');

        // 登陆
        Route::get('/','Admin\LoginController@login');

        // 退出登录
        Route::get('/outlog','Admin\LoginController@outlog');

    });


    //验证是否登陆中间件
    Route::group(['prefix' => 'index'],function (){

        // 后台首页路由
        Route::get('/','Admin\IndexController@index');

    });