<?php

namespace App\Http\Controllers\Api\Ver0_9_0\Account;

use App\Authentication\SoaUser;
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
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGFyYXZlbC1hcHAubmV0L3VzZXIvbG9naW4iLCJpYXQiOjE1MTY2MDI3MzMsImV4cCI6MTUxNjYwNjMzMywibmJmIjoxNTE2NjAyNzMzLCJqdGkiOiJnTW5xTExqQXRFU05OMERFIiwic3ViIjozODMsInBydiI6Ijg1MzIzODFhZjA0NmJiZGJmODNhODlmMDBhZGY1OTJjOTZhZDliOWQiLCJuaWNrTmFtZSI6ImNsYXJrIiwiZW1haWwiOiJjbGFya0BnbWFpbC5jb20ifQ.Nl_gV_mAwSzlnC-T4w76UZryV9z2yo81XW7AZMRz9VI';

        dd(app('tymon.jwt')->setToken($token)->check());
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

        //todo 基于input从soa、db或第三方认证成功后，获取到用户信息

        $userId = rand(0,1000);
        $appendUserInfo = ['nickName' => 'clark', 'email' => 'clark@gmail.com'];

        //认证
        $customClaims = ['foo' => 'bar', 'baz' => 'bob'];

        dd(app('tymon.jwt.auth')->authenticate());
        $payload = app('tymon.jwt')->customClaims($appendUserInfo);
        $token = app('tymon.jwt.manager')->encode($payload);

        $token = JWTAuth::encode($payload);

        exit($token = app('tymon.jwt')->fromUser(new SoaUser($userId, $appendUserInfo)));

//        dd(app('auth')->guard('app-api')->attempt($input));
//
//        dd(app('api.auth')->setUser((new SoaUserProvider()))->getUser());
        dd(app('auth')->guard('d-guard')->attempt($input));

        exit(\JWTAuth::fromUser((new User())));

        if ($input['username'] == 'terry' && $input['password'] == '123456') {
            $token = JWTAuth::fromUser($input, $appendUserInfo);
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
