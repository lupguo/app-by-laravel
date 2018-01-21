<?php
/**
 * Created by PhpStorm.
 * User: Terry
 * Date: 2018/1/22
 * Time: 01:27
 */

namespace App\Authentication;


use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\StatefulGuard;

class SoaGuard implements StatefulGuard
{

    /**
     * Determine if the current user is authenticated.
     *
     * @return bool
     */
    public function check()
    {
        // TODO: Implement check() method.
    }

    /**
     * Determine if the current user is a guest.
     *
     * @return bool
     */
    public function guest()
    {
        // TODO: Implement guest() method.
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
     * Get the ID for the currently authenticated user.
     *
     * @return int|null
     */
    public function id()
    {
        // TODO: Implement id() method.
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
     * Set the current user.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     *
     * @return void
     */
    public function setUser(Authenticatable $user)
    {
        // TODO: Implement setUser() method.
    }

    /**
     * Attempt to authenticate a user using the given credentials.
     *
     * @param  array $credentials
     * @param  bool  $remember
     *
     * @return bool
     */
    public function attempt(array $credentials = [], $remember = false)
    {
        return 'helloToken';
        // TODO: Implement attempt() method.
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
    public function logout() {
 // TODO: Implement logout() method.
}}