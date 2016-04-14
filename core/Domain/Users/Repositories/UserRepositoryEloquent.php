<?php namespace Core\Domain\Users\Repositories;

use Core\Domain\Users\Entities\User;
use CVEPDB\Domain\Users\Repositories\UserRepositoryEloquent as RepositoryEloquent;
use Illuminate\Container\Container as Application;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent as RoleRepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
abstract class UserRepositoryEloquent extends RepositoryEloquent
{
    public function __construct(Application $app, RoleRepositoryEloquent $r_roles)
    {
        parent::__construct($app, $r_roles);
    }

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
