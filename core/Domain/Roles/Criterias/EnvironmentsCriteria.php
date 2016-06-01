<?php namespace Core\Domain\Roles\Criterias;

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
			$model
				->join('environment_role', 'environment_role.role_id', '=', 'roles.id')
				->join('environments', 'environments.id', '=', 'environment_role.environment_id')
				->whereIn('environments.id', $this->envs);
		}

		return $model;
	}
}
