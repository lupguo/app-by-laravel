<?php
/**
 * Authenticatable 定义了一个可以被用来认证的模型或类需要实现的接口，也就是说，如果需要用一个自定义的类来做认证，需要实现这个接口定义的方法。
 *
 * @author  Terry (psr100)
 * @date    2018/1/19
 * @since   2018/1/19 18:22
 */

namespace App\Authentication;

use Illuminate\Contracts\Auth\Authenticatable;

class SoaUserAuth implements Authenticatable
{

    /**
     *
     * @var 用户提供者
     */
    protected $userId ;

    public function __construct($userId)
    {
        $this->userId = $userId;
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
        // TODO: Implement getAuthPassword() method.
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken()
    {
        // TODO: Implement getRememberToken() method.
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