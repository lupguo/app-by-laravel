<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Api\Ver0_9_0'], function(\Illuminate\Routing\Router $router) {
    $router->any('/', 'System\TestController@welcome');
});


