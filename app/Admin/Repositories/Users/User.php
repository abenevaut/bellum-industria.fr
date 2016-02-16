<?php

namespace App\Admin\Repositories\Users;

use CVEPDB\Repositories\Users\User as UserModel;

class User extends UserModel
{
    /**
     * The entites that belong to the user.
     */
    public function entites()
    {
        return $this->belongsToMany('App\Admin\Repositories\Entites\Entite');
    }
}
