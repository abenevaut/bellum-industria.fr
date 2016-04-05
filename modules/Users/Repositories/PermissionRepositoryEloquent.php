<?php namespace Modules\Users\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use CVEPDB\Repositories\Permissions\PermissionRepositoryEloquent as BasePermissionRepositoryEloquent;
use Modules\Users\Entities\Permission;

/**
 * Class PermissionRepositoryEloquent
 * @package namespace App\Repositories;
 */
class PermissionRepositoryEloquent extends BasePermissionRepositoryEloquent
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Permission::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
