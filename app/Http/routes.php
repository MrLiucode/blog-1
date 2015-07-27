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

Route::get('/', function () {
    return display('index');
//    return display('article');
    return view('welcome');
});

Route::get('article', function(){
    return display('article');
});

Route::get('admin/login',function(){
    return view('admin.login');
});
Route::get('admin/index',function(){
    return view('admin.index');
});

//Route::get('admin/option', function(){ return '11111';});
Route::group(['prefix' => 'admin'], function(){

    /*
    |--------------------------------------------------------------------------
    | 系统配置模块
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix' => 'option', 'namespace' => 'Admin'], function(){

        $optionController = 'OptionController@';
        Route::get('/', $optionController . 'index');
    });



});

//Route::grop(['prefix' => 'admin'], function(){
//
//    Route::get('/', function(){
//        return view('admin.index');
//        //    return display('admin.index');
//    });
//});


