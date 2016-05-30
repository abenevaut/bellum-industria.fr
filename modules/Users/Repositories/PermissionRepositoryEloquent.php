<?php namespace Modules\Users\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use CVEPDB\Domain\Permissions\Repositories\PermissionRepositoryEloquent as BasePermissionRepositoryEloquent;
use Modules\Users\Entities\Permission;

/**
 * Class PermissionRepositoryEloquent
 * @package Modules\Users\Repositories
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
