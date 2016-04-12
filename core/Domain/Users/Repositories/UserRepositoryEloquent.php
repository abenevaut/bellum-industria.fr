<?php namespace Core\Domain\Users\Repositories;

use Core\Domain\Users\Entities\User;
use CVEPDB\Domain\Users\Repositories\UserRepositoryEloquent as RepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
abstract class UserRepositoryEloquent extends RepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }
}
