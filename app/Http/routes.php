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

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::get('/', 'HomeController@index');    //TODO:test
    Route::resource('article', 'ArticleController');    //文章模块
    Route::resource('category', 'CategoryController');  //文章分类处理模块
    Route::resource('errorLog', 'ErrorLogController', ['only' => ['index', 'show']]);  //错误日志模块
});

/**
 * ACL 权限控制组
 */
Route::group(['prefix' => 'admin/acl', 'namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::resource('group', 'ACLGroupController', ['except' => ['show']]); //权限组模块
    Route::resource('permission', 'ACLPermissionController', [
        'except' => ['create', 'show']  //排除路由
    ]);   //权限模块
    Route::resource('user', 'ACLUserController');   //用户模块
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

Route::get('testPermission', ['as' => 'test.permission', 'uses' => 'TestController@test']);
if(env('APP_DEBUG')){
    Route::resource('test', 'TestController');
}
