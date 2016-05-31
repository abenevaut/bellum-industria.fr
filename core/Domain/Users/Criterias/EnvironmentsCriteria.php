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
			return $model->leftJoin('environment_user', 'users.id', '=', 'environment_user.user_id')
				->leftJoin('environments', 'environments.id', '=', 'environment_user.environment_id')
				->whereIn('environments.id', $this->envs)
				->groupBy('users.id');
		}

		return $model;
	}
}
