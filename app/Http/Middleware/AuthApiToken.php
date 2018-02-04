<?php

namespace App\Http\Middleware;

use Closure;

class AuthApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (false == auth('d-guard')->check()) {
            return ['status'=> 1, 'msg' => 'Api token auth failed !!'];
        }

        return $next($request);
    }
}
