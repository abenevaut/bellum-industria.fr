<?php namespace Modules\Steam\Repositories;

use Modules\Steam\Entities\Role;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent as RepositoryEloquent;

/**
 * Class RoleRepositoryEloquent
 * @package Modules\Steam\Repositories
 */
class RoleRepositoryEloquent extends RepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Role::class;
    }
}
