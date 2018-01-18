<?php

namespace App\Http\Controllers\Api;

use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    //
    use Helpers;

    protected $appVersion = '';

    protected $appSubtype = '';

    public function __construct()
    {
//        $api = app(' Dingo\Api\Routing\Router');

//        $this->appVersion = $api->getCurrentRequest()->version();
//
//        $this->appSubtype = $api->getCurrentRequest()->subtype();
    }

}
