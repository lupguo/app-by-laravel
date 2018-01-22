<?php
/**
 * Authenticatable 定义了一个可以被用来认证的模型或类需要实现的接口，也就是说，如果需要用一个自定义的类来做认证，需要实现这个接口定义的方法。
 *
 * @author  Terry (psr100)
 * @date    2018/1/19
 * @since   2018/1/19 18:22
 */

namespace App\Authentication;


use Tymon\JWTAuth\Contracts\Providers\Auth;

class SoaAuthUser implements Auth
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