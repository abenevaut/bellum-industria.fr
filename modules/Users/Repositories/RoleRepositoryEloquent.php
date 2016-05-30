<?php namespace Modules\Users\Repositories;

use Modules\Users\Entities\Role;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent as RepositoryEloquent;

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
