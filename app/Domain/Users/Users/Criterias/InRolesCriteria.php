<?php

namespace bellumindustria\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use bellumindustria\Infrastructure\Contracts\Criterias\CriteriaAbstract;

class InRolesCriteria extends CriteriaAbstract
{

	/**
	 * @var array roles
	 */
	private $roles = [];

	/**
	 * @param string $roles
	 */
	public function __construct($roles = [])
	{
		$this->roles = $roles;
	}

	/**
	 * @param $model
	 * @param RepositoryInterface $repository
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository)
	{
		return $model
			->join('role_user AS INROLE_role_user', 'users.id', '=', 'INROLE_role_user.user_id')
			->whereIn('INROLE_role_user.role_id', $this->roles);
	}

}
