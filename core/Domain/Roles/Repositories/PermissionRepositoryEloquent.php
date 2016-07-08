<?php namespace Core\Domain\Roles\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use CVEPDB\Domain\Permissions\Repositories\PermissionRepositoryEloquent as BasePermissionRepositoryEloquent;
use Core\Domain\Roles\Entities\Permission;

/**
 * Class PermissionRepositoryEloquent
 * @package Core\Domain\Roles\Repositories
 */
class PermissionRepositoryEloquent extends BasePermissionRepositoryEloquent
{

	/*
	 * Environment relative permission
	 */

	// Allow to access admin panel
	const ACCESS_ADMIN_PANEL = 'access_admin_panel';

	// Allow to see the environment notion
	const SEE_ENVIRONMENT = 'see_env';

	// Allow to CRUD evironments
	const MANAGE_ENVIRONMENT = 'manage_env';

	// Allow to clone items between environments
	const MANAGE_ENVIRONMENT_ITEMS = 'manage_env_items';

	// Allow to access backups directory
	const CAN_READ_BACKUPS_DIRECTORY = 'can_read_backups_directory';

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
