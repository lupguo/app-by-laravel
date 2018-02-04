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
     * Retrieve a user by their unique identifier.
     *
     * @param  mixed $identifier
     *
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveById($identifier)
    {
        //TODO 基于用户UID从SOA获取对应的用户明细
        $userInfo = [
            'userId' => $identifier,
            'email' => 'terry@gmail.com',
            'sex' => 'm',
        ];

        if (!empty($userInfo)) {
            return new SoaUserAuth($identifier, $userInfo);
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
        return $this->retrieveById($identifier);
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
            return $this->retrieveById($payload['sub']);
        }

        return ;
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