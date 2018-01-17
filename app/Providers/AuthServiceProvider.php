<?php

namespace App\Providers;

use App\Account;
use Dingo\Api\Auth\Provider\Authorization;
use Dingo\Api\Routing\Route;
use Illuminate\Http\Request;
use Dingo\Api\Contract\Auth\Provider as ServiceProvider;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

//class AuthServiceProvider implements ServiceProvider{
class AuthServiceProvider extends Authorization {

    /**
     * Get the providers authorization method.
     *
     * @return string
     */
    public function getAuthorizationMethod()
    {
        // TODO: Implement getAuthorizationMethod() method.

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
        // TODO: Implement authenticate() method.
        if ($request->input('password') == '123456') {
            return ['user' => 'Terry.clark'];
        }

        throw new UnauthorizedHttpException('Unable to authenticate with supplied username and password.');
    }
}

