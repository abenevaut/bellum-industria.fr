<?php namespace Core\Domain\Permissions\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use CVEPDB\Domain\Permissions\Repositories\PermissionRepositoryEloquent as BasePermissionRepositoryEloquent;
use Core\Domain\Permissions\Entities\Permission;

/**
 * Class PermissionRepositoryEloquent
 * @package Modules\Users\Repositories
 */
class PermissionRepositoryEloquent extends BasePermissionRepositoryEloquent
{

	/*
	 * Environment relative permission
	 */

	// Allow to see the environment notion
	const SEE_ENVIRONMENT = 'see_env';

	// Allow to CRUD evironments
	const MANAGE_ENVIRONMENT = 'manage_env';

	// Allow to clone items between environments
	const MANAGE_ENVIRONMENT_ITEMS = 'manage_env_items';

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
