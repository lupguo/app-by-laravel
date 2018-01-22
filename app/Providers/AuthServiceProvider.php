<?php

namespace App\Providers;

use App\Authentication\AppApiGuard;
use App\Authentication\SoaUser;
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
        \Auth::extend('d-driver', function($app) {
            return new AppApiGuard();
        });

        //用户认证
        \Auth::provider('d-user-provider', function ($app, array $config) {
            // 返回 Illuminate\Contracts\Auth\UserProvider 实例...
            return new SoaUser();
        });
    }
}

