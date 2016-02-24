<?php

namespace App\Admin\Repositories\Users;

use Chrisbjr\ApiGuard\Models\ApiKey as ApiKeyApiGuard;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class ApiKey extends ApiKeyApiGuard implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'user_id',
        'key',
        'level',
        'ignore_limits'
    ];

    /**
     * The apilogs that belong to the apikey.
     */
    public function apilogs()
    {
        return $this->hasMany('App\Admin\Repositories\Users\ApiLog');
    }

    /**
     * The user that belong to the apikey.
     */
    public function user()
    {
        return $this->hasOne('App\Admin\Repositories\Users\User');
    }
}
