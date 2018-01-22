<?php

namespace App;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User implements JWTSubject
{
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return 'gearbest-app';
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'nickname'  => 'terry',
            'telphone'  => 18503099999
        ];
    }
}
