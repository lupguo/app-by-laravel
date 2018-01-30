<?php

namespace App\Http\Controllers\Api\Ver0_9_0\System;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    //
    public function welcome()
    {
        return view('welcome');
    }

    public function info()
    {
        phpinfo();
    }
}
