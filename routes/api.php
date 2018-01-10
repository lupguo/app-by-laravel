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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

$api = app('Dingo\Api\Routing\Router');

//v0.9.0
$api->version('v0.9.0', [
    'namespace' => 'App\Http\Controllers\Api\Ver0_9_0'
], function(\Dingo\Api\Routing\Router $api){

    $api->get('/user/login', 'Account\UserController@login');
    $api->get('/user/register', 'Account\UserController@register');
    $api->get('/user/info', 'Account\UserController@userInfo');

    $api->get('/system/info', 'System\SystemController@info');
});

//v0.9.5
$api->version('v0.9.5', [
    'namespace' => 'App\Http\Controllers\Api\Ver0_9_5'
], function(\Dingo\Api\Routing\Router $api){

    $api->get('/user/login', 'Account\UserController@login');
    $api->get('/user/register', 'Account\UserController@register');
    $api->get('/user/info', 'Account\UserController@info');

    $api->get('/system/info', 'System\SystemController@info');
});
