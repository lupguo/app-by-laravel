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


use Illuminate\Auth\TokenGuard;

class AppApiGuard extends TokenGuard
{
    /**
     * @var SoaUser
     */
    protected $provider;

    /**
     * 用户尝试登陆
     *
     * @param $credentials
     *
     * @return bool
     */
    public function attempt($credentials)
    {
        //TODO : soa auth by credentials
        //$loginRs = soa_login($credentials);
        // ...
        $userId = rand(1,1000);
        $appendInfo = [
            'nickname' => 'clark@gmail.com',
            'ages'     => '30',
        ];

        //认证成功
        if (true) {
            //初始化登陆用户
            $this->setUser(new SoaUserAuth($userId));

            //返回jwt
            return $this->provider->createJwtFromSubjectId($userId, $appendInfo);
        }

        return false;
    }


}