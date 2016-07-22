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
				->join('environment_user AS uc_environments_eu', 'users.id', '=', 'uc_environments_eu.user_id')
				->join('environments AS uc_environments_e1', 'uc_environments_e1.id', '=', 'uc_environments_eu.environment_id')
				->whereIn('uc_environments_e1.id', $this->envs)
				->join('role_user AS uc_environments_ru', 'users.id', '=', 'uc_environments_ru.user_id')
				->join('roles AS uc_environments_r', 'uc_environments_r.id', '=', 'uc_environments_ru.role_id')
				->join('environment_role AS uc_environments_er', 'uc_environments_r.id', '=', 'uc_environments_er.role_id')
				->join('environments AS uc_environments_e2', 'uc_environments_e2.id', '=', 'uc_environments_er.environment_id')
				->whereIn('uc_environments_e2.id', $this->envs)
				->groupBy('users.id');
		}

		return $model;
	}
}
