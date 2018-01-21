<?php

namespace App\Http\Controllers\Api\Ver0_9_0\Account;

use App\Authentication\SoaUserProvider;
use App\Http\Controllers\Api\ApiController;
use App\User;
use Illuminate\Http\Request;
use Tymon\JWTAuth\JWTAuth;

class UserController extends ApiController
{

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login1(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }


    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return \Auth::guard();
    }

    public function login()
    {
        $input = ['username' => 'terry', 'password' => '123456'];

        //认证
        $token = null;

//            if (! $token = \JWTAuth::attempt($input)) {
//                return response()->json(['error' => 'invalid_credentials'], 401);
//            }
        $appendUserInfo = ['tel' => 18603067721];

//        dd(app('auth')->guard('app-api')->attempt($input));
//
//        dd(app('api.auth')->setUser((new SoaUserProvider()))->getUser());

        exit(\JWTAuth::fromUser((new User())));

        dd(app('api.auth'));
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
