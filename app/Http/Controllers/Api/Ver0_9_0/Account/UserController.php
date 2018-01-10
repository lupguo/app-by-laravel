<?php

namespace App\Http\Controllers\Api\Ver0_9_0\Account;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends ApiController
{

    public function login()
    {

        $userInfo = [
            'userId' => 1001,
            'userName' => 'Terry',
        ];

        return [
            'status' => 200,
            'data' => $userInfo,
            'subtype' => $this->appSubtype,
            'version' => $this->appVersion,
        ];
    }

    public function register()
    {

    }

    public function userInfo()
    {
        return [
            'status' => 200,
            'data' => '',
        ];
    }
}
