<?php
/**
 * UserProvider 接口定义了获取认证模型的方法，比如根据 id 获取模型，根据 email 获取模型等等.
 *
 * @author  Terry (psr100)
 * @date    2018/1/20
 * @since   2018/1/20 15:09
 */

namespace App\Authentication;


use Illuminate\Contracts\Auth\Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class SoaUser2 implements JWTSubject, Authenticatable
{
    /**
     * @var array 用户信息
     */
    protected $claims;

    /**
     * @var integer 用户ID
     */
    protected $subject;

    /**
     * @param       $userId
     * @param array $claims
     *
     * @return $this
     */
    public function __construct($userId = 0, $claims = [])
    {
        $this->sub($userId);
        $this->claims($claims);

        return $this;
    }

    /**
     * @param $userId
     *
     * @return $this
     */
    public function sub($userId)
    {
        $this->subject = $userId;

        return $this;
    }

    /**
     * 填充自定义信息
     *
     * @param array $claims
     *
     * @return $this
     */
    public function claims(array $claims)
    {
        $this->claims = $claims;

        return $this;
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->subject;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return $this->claims;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName()
    {
        // TODO: Implement getAuthIdentifierName() method.
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier()
    {
        // TODO: Implement getAuthIdentifier() method.
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