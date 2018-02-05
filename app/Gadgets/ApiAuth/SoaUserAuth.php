<?php
/**
 * Authenticatable 定义了一个可以被用来认证的模型或类需要实现的接口，也就是说，如果需要用一个自定义的类来做认证，需要实现这个接口定义的方法。
 *
 * @author  Terry (psr100)
 * @date    2018/1/19
 * @since   2018/1/19 18:22
 */

namespace App\Gadgets\ApiAuth;

use Illuminate\Contracts\Auth\Authenticatable;

class SoaUserAuth implements Authenticatable
{

    /**
     *
     * @var integer 用户提供者
     */
    protected $userId ;

    /**
     * @var array 用户基础信息
     */
    protected $userInfo;

    /**
     * SoaUserAuth constructor.
     *
     * @param       $userId
     * @param array $userInfo
     */
    public function __construct($userId = 0, array $userInfo = [])
    {
        $this->userId = $userId;
        $this->userInfo = $userInfo;
    }

    /**
     * 获取已认证用户基本信息
     *
     * @param $property
     *
     * @return mixed|null
     */
    public function __get($property)
    {
        return isset($this->userInfo[$property]) ? $this->userInfo[$property] : null;
    }

    /**
     * 获取已认证用户明细
     *
     * @param $property
     *
     * @return array|mixed|null
     */
    public function info($property = null)
    {
        return isset($property) ? $this->__get($property) : $this->userInfo;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {

    }

    /**
     * 返回已认证的用户的UID
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        return $this->userId;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {

    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {

    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     *
     * @return void
     */
    public function setRememberToken($value)
    {
        // TODO: Implement setRememberToken() method.
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        // TODO: Implement getRememberTokenName() method.
    }
}