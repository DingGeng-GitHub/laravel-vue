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
Route::group(['prefix' => 'admin2'],function (){

    Route::group(['prefix' => 'login'],function(){
        // 登陆 写在中间件外面
        Route::get('/','Admin\LoginController@login');

        // 注册 写在中间件外面
        Route::get('/register','Admin\LoginController@register');

    });

    //验证是否登陆中间件
    Route::group(['middleware' => 'admin'],function (){

        // 后台首页路由
        Route::group(['prefix' => 'admin'],function (){

            //
            Route::get('/','Admin\IndexController@index');
        });
    });
});