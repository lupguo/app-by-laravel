<?php

namespace App\Http\Controllers\Api\Ver0_9_0\Account;

use App\Http\Controllers\Api\ApiController;
use Dingo\Api\Auth\Provider\JWT;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTFactory;
use Tymon\JWTAuth\JWTAuth;

class UserController extends ApiController
{

    public function login()
    {
        $input = ['username' => 'terry', 'password' => '123456'];

        //认证
        $token = null;

//            if (! $token = \JWTAuth::attempt($input)) {
//                return response()->json(['error' => 'invalid_credentials'], 401);
//            }

        $appendUserInfo = ['tel' => 18603067721];

        $customClaims = ['foo' => 'bar', 'baz' => 'bob'];

        $payload = JWTFactory::make($customClaims);

        $token1 = \JWT::encode($payload);

        dd($token1);


        if ($input['username'] == 'terry' && $input['password'] == '123456') {
            $token = JWTAuth::fromUser($input, $appendUserInfo);
        } else {
            throw new \Exception('认证失败，用户名或密码错误！');
        }

        $userInfo = [
            'username' => 'Terry',
            'ages'     => 29,
            'sex'      => 'man',
            'email' => 'cocoglp@163.com',
        ];

        return [
            'status' => 200,
            'token'  => $token,
            'token1'  => $token,
            'data' => $input,
            'subtype' => $this->appSubtype,
            'version' => $this->appVersion,
        ];
    }

    public function userInfo()
    {
        return [
            'status' => 200,
            'data' => '',
        ];
    }
}
