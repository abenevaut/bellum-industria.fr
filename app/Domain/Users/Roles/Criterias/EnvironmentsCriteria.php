<?php namespace cms\Core\Domain\Users\Roles\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use cms\Infrastructure\Abstractions\Criterias\CriteriaAbstract;

/**
 * Class EnvironmentsCriteria
 * @package cms\Core\Domain\Users\Roles\Criterias
 */
class EnvironmentsCriteria extends CriteriaAbstract
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
				->join('environment_role', 'environment_role.role_id', '=', 'roles.id')
				->join('environments', 'environments.id', '=', 'environment_role.environment_id')
				->whereIn('environments.id', $this->envs);
		}

		return $model;
	}
}
