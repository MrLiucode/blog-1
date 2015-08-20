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

Route::get('/', ['as' => 'home', 'uses' => 'ArticleController@index']);

Route::resource('article', 'ArticleController');

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

    /*
    |--------------------------------------------------------------------------
    | 文章分类模块
    |--------------------------------------------------------------------------
    */
    Route::resource('category', 'CategoryController', ['except' => ['show']]);

    /*
    |--------------------------------------------------------------------------
    | 文章模块
    |--------------------------------------------------------------------------
    */
    Route::resource('article', 'ArticleController');

});

Route::get('view', 'TestController@view');
Route::any('test', 'TestController@index');
Route::any('clean', 'TestController@cleanCache');


