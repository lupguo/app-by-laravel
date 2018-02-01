<?php

namespace App\Http\Controllers\Api\Ver0_9_5\System;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SystemController extends ApiController
{
    //
    public function info()
    {

        return [
            'version'   => '0.9.5',
            'username'  => 'Clark',
        ];
    }
}
