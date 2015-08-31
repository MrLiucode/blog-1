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

$app->get('/a', function() use ($app) {
    return 'Hello World!';
});



$app->group(['namespace' => 'App\Http\Controllers\Admin', 'prefix' => 'system'], function($app) {
    $app->get('/', 'HomeController@index');
//    $app->get('admin', '');
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});