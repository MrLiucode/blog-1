<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return display('index');
////    return display('article');
//    return view('welcome');
//});

Route::get('article', function(){
    return display('article');
});


Route::group(['prefix' => 'home'], function(){

    /*
    |--------------------------------------------------------------------------
    | 前台基本模块
    |--------------------------------------------------------------------------
    */
    Route::get('/', 'HomeController@index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

    /*
    |--------------------------------------------------------------------------
    | 后台基本模块
    |--------------------------------------------------------------------------
    */
    Route::get('login', function(){

        return view('admin.login');
    });

    Route::get('index', function(){

        return view('admin.base');
    });


    /*
    |--------------------------------------------------------------------------
    | 系统配置模块
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'option'], function(){

        $optionController = 'OptionController@';
        Route::get('/', ['as' => 'system.base.option.index', 'uses' => $optionController . 'index']);   //系统设置首页
        Route::post('base', ['as' => 'system.base.option.update', 'uses' => $optionController . 'updateBaseOption']);   //更新系统基本设置

    });



});


Route::any('test', 'TestController@index');
Route::any('clean', 'TestController@cleanCache');
//Route::grop(['prefix' => 'admin'], function(){
//
//    Route::get('/', function(){
//        return view('admin.index');
//        //    return display('admin.index');
//    });
//});


