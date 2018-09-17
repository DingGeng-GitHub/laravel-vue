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

        // 注册
        Route::get('/register','Admin\LoginController@register');

        // 登陆
        Route::get('/login','Admin\LoginController@login');

        // 退出登录
        Route::get('/outlog','Admin\LoginController@outlog');




    //后台首页
    Route::group(['prefix' => 'index'],function (){

        // 后台首页路由
        Route::get('/','Admin\IndexController@index');

    });


    //Excel导出
    Route::get('/excel/export','Admin\ExcelController@export');
    //Excel导入
    Route::get('/excel/import','Admin\ExcelController@import');