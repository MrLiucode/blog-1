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
    return view('admin.category.index');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){
    
    Route::get('/', 'HomeController@index');

    /**
     * 文章模块
     */
    Route::resource('article', 'ArticleController');

    /**
     * 文章分类处理模块
     */
    Route::resource('category', 'CategoryController');


});

if(env('APP_DEBUG')){
    Route::resource('test', 'TestController');
}
