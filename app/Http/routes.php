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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    
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

/**
 * 自动认证模块
 */
Route::controllers([
    'auth' => 'Auth\AuthController',
]);

if(env('APP_DEBUG')){
    Route::resource('test', 'TestController');
}

Route::group(['middleware' => 'permission'], function(){
    Route::get('testPermission', ['as' => 'test.permission', 'uses' => 'TestController@test']);
});
