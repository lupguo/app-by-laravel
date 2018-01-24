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


use Illuminate\Auth\GuardHelpers;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;

class AppApiGuard2 extends TokenGuard
{
    /**
     * Soa用户认实例
     *
     * @var SoaUserAuth
     */
    private $soaUserAuth;

    /**
     * Soa用户对象
     *
     * @var SoaUser
     */
    private $soaUser;


    public function __construct()
    {
        $this->soaUserAuth = new SoaUserAuth();

        $this->soaUser = new SoaUser();
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array $credentials
     * @param  bool  $remember
     *
     * @return bool
     * @throws \Exception
     */
    public function attempt(array $credentials = [], $remember = false)
    {
        if ($this->validate($credentials) == false) {
            throw new \Exception('user input validate fail !!');
        }

        //auth check
        $soaUser = $this->soaUserAuth->byCredentials($credentials);

        return $token = app('tymon.jwt')->fromUser($soaUser);
    }

    /**
     * Get the currently authenticated user.
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function user()
    {
        // TODO: Implement user() method.
    }

    /**
     * Validate a user's credentials.
     *
     * @param  array $credentials
     *
     * @return bool
     */
    public function validate(array $credentials = [])
    {
        // TODO: Implement validate() method.
    }

    /**
     * Log a user into the application without sessions or cookies.
     *
     * @param  array $credentials
     *
     * @return bool
     */
    public function once(array $credentials = [])
    {
        // TODO: Implement once() method.
    }

    /**
     * Log a user into the application.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  bool                                       $remember
     *
     * @return void
     */
    public function login(Authenticatable $user, $remember = false)
    {
        // TODO: Implement login() method.
    }

    /**
     * Log the given user ID into the application.
     *
     * @param  mixed $id
     * @param  bool  $remember
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function loginUsingId($id, $remember = false)
    {
        // TODO: Implement loginUsingId() method.
    }

    /**
     * Log the given user ID into the application without sessions or cookies.
     *
     * @param  mixed $id
     *
     * @return bool
     */
    public function onceUsingId($id)
    {
        // TODO: Implement onceUsingId() method.
    }

    /**
     * Determine if the user was authenticated via "remember me" cookie.
     *
     * @return bool
     */
    public function viaRemember()
    {
        // TODO: Implement viaRemember() method.
    }

    /**
     * Log the user out of the application.
     *
     * @return void
     */
    public function logout()
    {
        // TODO: Implement logout() method.
}}