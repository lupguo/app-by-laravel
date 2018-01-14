<?php

namespace App\Providers;

use Dingo\Api\Contract\Auth\Provider;
use Dingo\Api\Routing\Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class SoaUserProvider implements Provider
{

    /**
     * Authenticate the request and return the authenticated user instance.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Dingo\Api\Routing\Route $route
     *
     * @return mixed
     */
    public function authenticate(Request $request, Route $route)
    {
        // Logic to authenticate the request.
        if ($request->input('username') != 'terry' && $request->input('passowrd') != '123456') {
            throw new UnauthorizedHttpException('Unable to authenticate with supplied username and password.');
        }

    }
}
