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

class SoaUserAuth implements Auth
{
    /**
     * @var SoaUser
     */
    private $soaUser;

    /**
     * Check a user's credentials.
     *
     * @param  array $credentials
     *
     * @return mixed
     */
    public function byCredentials(array $credentials)
    {
        //TODO : soa auth by credentials
        if (true) {
            $userId = rand(1,1000);
            $appendInfo = [
                'nickname' => 'clark@gmail.com',
                'ages'     => '30',
            ];

            //初始化登陆用户
            return $this->soaUser = new SoaUser($userId, $appendInfo);
        }

        //throw new AuthExceptions('用户名密码认证失败!');
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
        //TODO : soa auth by userID
    }

    /**
     * Get the currently authenticated user.
     *
     * @return mixed
     */
    public function user()
    {
        return $this->soaUser;
    }
}