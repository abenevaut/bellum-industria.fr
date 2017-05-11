<?php

namespace bellumindustria\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use bellumindustria\Infrastructure\Contracts\Criterias\CriteriaAbstract;
use bellumindustria\Domain\Users\Roles\Role;
use bellumindustria\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;

/**
 * Class IsCurrentUserSuperAdmin
 * @package panacea\Domain\Users\Users\Criterias
 */
class IsCurrentUserSuperAdmin extends CriteriaAbstract
{

	/**
	 * @var bool $isCurrentUserSuperAdmin
	 */
	private $isCurrentUserSuperAdmin = false;

	/**
	 * @param bool $isCurrentUserSuperAdmin
	 */
	public function __construct($isCurrentUserSuperAdmin = false)
	{
		$this->isCurrentUserSuperAdmin = $isCurrentUserSuperAdmin;
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository)
	{
		if ($this->isCurrentUserSuperAdmin)
		{
			return $model;
		}

		$role_super_admin_id = Role::where(
			'name',
			'=',
			RolesRepositoryEloquent::ROLE_SUPER_ADMIN
		)
			->first()
			->id;

		return $model
			->join('role_user AS INROLE_role_super_admin', 'users.id', '=', 'INROLE_role_super_admin.user_id')
			->whereNotIn('INROLE_role_super_admin.role_id', [$role_super_admin_id]);
	}

}
