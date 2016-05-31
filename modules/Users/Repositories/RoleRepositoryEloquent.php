<?php namespace Modules\Users\Repositories;

use Core\Domain\Roles\Repositories\RoleRepositoryEloquent as CoreRoleRepositoryEloquent;

/**
 * Class RoleRepositoryEloquent
 * @package Modules\Users\Repositories
 */
class RoleRepositoryEloquent extends CoreRoleRepositoryEloquent
{

	/**
	 * Roles list without the default "user" role.
	 *
	 * @return mixed
	 */
	public function listWithoutUser()
	{
		return $this->findWhereNotIn(
			'name',
			[
				RoleRepositoryEloquent::USER
			]
		);
	}
}
