<?php

namespace App\Providers;

use App\Authentication\SoaGuard;
use App\Authentication\SoaUserProvider;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider {

    /**
     * 注册任意应用认证／授权服务。
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //认证驱动
        \Auth::extend('soa-jwt', function($app) {
            return new SoaGuard();
        });

        //用户认证
        \Auth::provider('soa-users', function ($app, array $config) {
            // 返回 Illuminate\Contracts\Auth\UserProvider 实例...
            return new SoaUserProvider();
        });
    }
}

