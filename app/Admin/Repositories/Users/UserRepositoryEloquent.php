<?php

namespace App\Admin\Repositories\Users;

use App\Admin\Repositories\Users\User;
use CVEPDB\Repositories\Users\UserRepositoryEloquent as UserRepositoryEloquentParent;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends UserRepositoryEloquentParent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return \App\Admin\Repositories\Users\User::class;
    }

}
