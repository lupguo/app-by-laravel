<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

\Route::group([
    'namespace' => 'Api\Ver0_9_0',
], function(\Illuminate\Routing\Router $router) {

    $router->any('/', 'System\TestController@welcome');
    $router->any('/user/login', 'Account\UserController@login');

    //need auth
    \Route::group(['middleware' => 'jwt_auth'], function () use ($router) {
        $router->get('/system/info', 'System\SystemController@info');
        $router->get('/user/info', 'Account\UserController@info');

    });
});

