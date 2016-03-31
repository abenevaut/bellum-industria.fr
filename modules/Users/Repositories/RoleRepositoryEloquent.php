<?php namespace Modules\Users\Repositories;

use Modules\Users\Entities\Role;
use CVEPDB\Repositories\Roles\RoleRepositoryEloquent as RoleRepositoryEloquentParent;

/**
 * Class RoleRepositoryEloquent
 * @package Modules\Users\Repositories
 */
class RoleRepositoryEloquent extends RoleRepositoryEloquentParent
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
