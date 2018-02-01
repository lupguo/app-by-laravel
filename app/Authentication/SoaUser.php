<?php
/**
 * UserProvider 接口定义了获取认证模型的方法，比如根据 id 获取模型，根据 email 获取模型等等.
 *
 * @author  Terry (psr100)
 * @date    2018/1/20
 * @since   2018/1/20 15:09
 */

namespace App\Authentication;


use Firebase\JWT\JWT;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\UserProvider;


class SoaUser implements UserProvider
{
    /**
     * @var \App
     */
    protected $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {

    }

    /**
     * Retrieve a user by their unique identifier and "remember me" token.
     *
     * @param  mixed  $identifier
     * @param  string $token
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByToken($identifier, $token)
    {

    }

    /**
     * Update the "remember me" token for the given user in storage.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  string                                     $token
     *
     * @return void
     */
    public function updateRememberToken(Authenticatable $user, $token)
    {

    }

    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array $credentials
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        //TODO : soa auth by credentials
        //$loginRs = soa_login($credentials);
        //if ($loginRs == ture) ...

        if (true) {
            $userId = rand(1,1000);
            $appendInfo = [
                'nickname' => 'clark@gmail.com',
                'ages'     => '30',
            ];

            //初始化登陆用户
            $key = "clark";
            $token = array(
                "iss" => "http://example.org",
                "aud" => "http://example.com",
                "iat" => time(),
                "nbf" => time()+3600*24*30,
                "sub" => $userId,
            );

            return JWT::encode($token, $key);
        }
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable $user
     * @param  array                                      $credentials
     *
     * @return bool
     */
    public function validateCredentials(Authenticatable $user, array $credentials)
    {

    }
}