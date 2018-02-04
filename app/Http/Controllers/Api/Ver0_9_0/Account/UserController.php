<?php

namespace App\Http\Controllers\Api\Ver0_9_0\Account;

use App\Authentication\AppApiGuard;
use App\Authentication\SoaUser;
use App\Http\Controllers\Api\ApiController;
use App\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        //api token
        if ($token = $this->guard()->attempt($credentials)) {
            return response()->json([
                'api_token' => $token,
                'subtype'   => $this->appSubtype,
                'version'   => $this->appVersion,
            ]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * 用户基本信息
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function info()
    {
        return response()->json([
            'userInfo' => $this->guard()->user()->info()
        ]);
    }

    /**
     * 登陆用户ID
     *
     * @return int|null
     */
    public function userId()
    {
        return auth('d-guard')->id();
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return AppApiGuard
     */
    public function guard()
    {
        return \Auth::guard('d-guard');
    }
}
