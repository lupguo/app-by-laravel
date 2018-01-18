<?php

namespace App\Providers;

use App\Account;
use Dingo\Api\Auth\Provider\JWT;
use Dingo\Api\Routing\Route;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class AuthServiceProvider extends JWT {

    /**
     * Get the providers authorization method.
     *
     * @return string
     */
    public function getAuthorizationMethod()
    {
        return parent::getAuthorizationMethod();
    }

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
        return parent::authenticate($request, $route);

        // TODO: Implement authenticate() method.
        if ($request->input('password') == '123456') {
            return ['user' => 'Terry.clark'];
        }

        throw new UnauthorizedHttpException('Unable to authenticate with supplied username and password.');
    }
}

