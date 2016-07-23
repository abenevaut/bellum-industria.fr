<?php namespace cms\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Core\Criterias\Criteria as AbsCriteria;

/**
 * Class RolesCriteria
 * @package Modules\Users\Criterias
 */
class RolesCriteria extends AbsCriteria
{

	/**
	 * @var array roles list of roles IDs
	 */
	private $roles = [];

	/**
	 * @param array $roles
	 */
	public function __construct($roles = [])
	{
		$this->roles = array_filter($roles);
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository)
	{
		if (count($this->roles))
		{
			return $model->leftJoin('role_user AS uc_roles_ru', 'users.id', '=', 'uc_roles_ru.user_id')
				->leftJoin('roles AS uc_roles_r', 'uc_roles_r.id', '=', 'uc_roles_ru.role_id')
				->whereIn('uc_roles_r.id', $this->roles)
				->groupBy('users.id');
		}

		return $model;
	}
}
