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


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;
use Tymon\JWTAuth\Contracts\Providers\Auth;

class AppApiGuard implements Auth
{

    /**
     * Check a user's credentials.
     *
     * @param  array $credentials
     *
     * @return mixed
     */
    public function byCredentials(array $credentials)
    {
        // TODO: Implement byCredentials() method.
    }

    /**
     * Authenticate a user via the id.
     *
     * @param  mixed $id
     *
     * @return mixed
     */
    public function byId($id)
    {
        // TODO: Implement byId() method.
    }

    /**
     * Get the currently authenticated user.
     *
     * @return mixed
     */
    public function user()
    {
        // TODO: Implement user() method.
    }
}