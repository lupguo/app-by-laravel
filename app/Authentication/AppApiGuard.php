<?php
/**
 * Guard 接口定义了某个实现了 Authenticatable (可认证的) 模型或类的认证方法以及一些常用的接口。
 *
 * StatefulGuard 接口继承自 Guard 接口，除了 Guard 里面定义的一些基本接口外，还增加了更进一步、有状态的 Guard.
 *
 * Laravel 中默认提供了 3 中 guard：RequestGuard，TokenGuard，SessionGuard.
 *
 * @author  Terry (psr100)
 * @date    2018/1/20
 * @since   2018/1/20 9:58
 */

namespace App\Authentication;


use Illuminate\Auth\TokenGuard;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;

class AppApiGuard extends TokenGuard
{

    public function __construct(UserProvider $provider, Request $request)
    {
        parent::__construct($provider, $request);
    }

    public function attempt($credentials)
    {
        return $this->provider->retrieveByCredentials($credentials);
    }

}