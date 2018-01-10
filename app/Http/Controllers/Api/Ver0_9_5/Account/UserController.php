<?php

namespace App\Http\Controllers\Api\Ver0_9_5\Account;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends ApiController
{
    public function login()
    {
        $userInfo = [
            'userId' => 1001,
            'userName' => 'Clark',
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
            'status' => 100,
            'data' => '',
        ];
    }
}
