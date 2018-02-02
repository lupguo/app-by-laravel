<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 2018/1/10
 * Time: 00:17
 */

namespace App\Http\Controllers\Api\Ver0_9_0\System;


use App\Http\Controllers\Controller;

class SystemController extends Controller
{
    public function login()
    {
        return \Auth::guard('d-guard')->attempt([]);

    }

    public function info()
    {
        return auth('d-guard')->user();
    }
}