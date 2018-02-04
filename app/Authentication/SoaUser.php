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

    /**
     * SoaUser constructor.
     *
     * @param             $app
     */
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
        //todo 基于用户UID从SOA获取对应的用户明细
        if (true) {
            return new SoaUserAuth($identifier);
        }

        return null;
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
        if ( ! isset($credentials['api_token'])) {
            return ;
        }

        if (false != ($payload = $this->parserJwt($credentials['api_token']))) {
            return new SoaUserAuth($payload['sub']);
        }

        return ;
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

    /**
     * 解析jwt，获取payload内容
     *
     * @param $jwt
     *
     * @return array|bool
     */
    public function parserJwt($jwt)
    {
        try {
            JWT::$leeway = 60; // $leeway in seconds
            $payload = JWT::decode($jwt, config('jwt.secret'), ['HS256', 'HS512']);

            return (array)$payload;
        } catch (\Exception $exception) {
//            throw $exception;
            //todo 需要针对解析失败的JWT进行Log记录分析

            return false;
        }
    }

    /**
     * 创建JWT token
     *
     * @param       $subjectId
     * @param array $payload
     *
     * @return string
     */
    public function createJwtFromSubjectId($subjectId, array $payload = [])
    {
        $nowTime = time();
        $payload = array_merge([
            "iss" => "https://www.gearbest.com",
            "aud" => "Gearbest App",
            "iat" => $nowTime,
            "nbf" => $nowTime,
            "exp" => $nowTime+ config('jwt.ttl')*60,
            "sub" => $subjectId,
        ], $payload);

        return JWT::encode($payload, config('jwt.secret'), config('jwt.algo'));
    }
}