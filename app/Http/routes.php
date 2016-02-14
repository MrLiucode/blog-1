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

/**
 * 前台模块
 */
Route::get('/', 'ArticleController@index'); //首页
Route::get('article/{article}', ['as' => 'article.show', 'uses' => 'ArticleController@show']);
Route::get('categoryArticle/{category}', 'ArticleController@categoryArticle');  //分类查询文章
Route::get('tagArticle/{tag}', 'ArticleController@tagArticle'); //标签查询文章
Route::get('userArticle/{user}', 'ArticleController@userArticle');  //用户的文章列表

/**
 * 后台模块
 */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/', 'ArticleController@index');
    Route::resource('article', 'ArticleController');    //文章模块
    Route::resource('category', 'CategoryController');  //文章分类处理模块
    Route::resource('tag', 'TagsController');   //文章标签模块
    Route::resource('errorLog', 'ErrorLogController', ['only' => ['index', 'show']]);  //错误日志模块
    Route::resource('setting', 'SettingController', ['only' => ['index', 'store']]);    //系统设置模块
    Route::resource('friendship', 'FriendshipController', ['except' => 'show']);  //友情链接模块

    Route::any('editorUpload', 'ToolController@editorUpload'); //编辑器文件上传
});

/**
 * ACL 权限控制组
 */
Route::group(['prefix' => 'admin/acl', 'namespace' => 'Admin', 'middleware' => 'auth'], function () {
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

if (env('APP_DEBUG')) {
    Route::resource('test', 'TestController');
}
