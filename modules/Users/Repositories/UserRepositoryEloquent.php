<?php namespace Modules\Users\Repositories;

use Modules\Users\Entities\User;
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
        return \Modules\Users\Entities\User::class;
    }
}
