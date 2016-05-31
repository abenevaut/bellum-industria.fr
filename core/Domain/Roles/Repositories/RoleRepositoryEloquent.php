<?php namespace Core\Domain\Roles\Repositories;

use Core\Domain\Roles\Entities\Role;
use CVEPDB\Domain\Roles\Repositories\RoleRepositoryEloquent as RepositoryEloquent;

/**
 * Class RoleRepositoryEloquent
 * @package Modules\Users\Repositories
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
