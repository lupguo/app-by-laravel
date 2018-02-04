<?php

use Illuminate\Http\Request;

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

Route::group([
    'namespace' => 'Api\Ver0_9_0',
], function(\Illuminate\Routing\Router $router) {

    $router->any('/', 'System\TestController@welcome');
    $router->any('/info', 'System\TestController@info');

    $router->any('/user/login', 'Account\UserController@login');
    $router->get('/user/info', 'Account\UserController@me');

    $router->get('/system/login', 'System\SystemController@login');
    $router->get('/system/info', 'System\SystemController@info')
           ->middleware('jwt_auth');
});