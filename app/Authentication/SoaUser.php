<?php
/**
 * UserProvider 接口定义了获取认证模型的方法，比如根据 id 获取模型，根据 email 获取模型等等.
 *
 * @author  Terry (psr100)
 * @date    2018/1/20
 * @since   2018/1/20 15:09
 */

namespace App\Authentication;


use Tymon\JWTAuth\Contracts\JWTSubject;

class SoaUser implements JWTSubject
{
    /**
     * @var array 用户信息
     */
    protected $userInfo;

    /**
     * @var integer 用户ID
     */
    protected $userId;

    /**
     * @param       $userId
     * @param array $appendUserInfo
     *
     * @return $this
     */
    public function appendInfo($userId, $appendUserInfo = [])
    {
        $this->userId   = $userId;
        $this->userInfo = $appendUserInfo;

        return $this;
    }


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->userId;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return $this->userInfo;
    }
}