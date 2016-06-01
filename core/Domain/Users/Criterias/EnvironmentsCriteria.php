<?php namespace Core\Domain\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use Core\Criterias\Criteria as AbsCriteria;

/**
 * Class EnvironmentsCriteria
 * @package Core\Domain\Users\Criterias
 */
class EnvironmentsCriteria extends AbsCriteria
{

	/**
	 * @var array envs list of environment IDs
	 */
	private $envs = [];

	/**
	 * @param array $envs
	 */
	public function __construct($envs = [])
	{
		$this->envs = array_filter($envs);
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository)
	{
		if (count($this->envs))
		{
			return $model

				->join('environment_user', 'users.id', '=', 'environment_user.user_id')
				->join('environments AS ENV1', 'ENV1.id', '=', 'environment_user.environment_id')
				->whereIn('ENV1.id', $this->envs)

				->join('role_user', 'users.id', '=', 'role_user.user_id')
				->join('roles', 'roles.id', '=', 'role_user.role_id')

				->join('environment_role', 'roles.id', '=', 'environment_role.role_id')
				->join('environments AS ENV2', 'ENV2.id', '=', 'environment_role.environment_id')
				->whereIn('ENV2.id', $this->envs)

				->groupBy('users.id');
		}

		return $model;
	}
}
