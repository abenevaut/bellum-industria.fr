<?php namespace cms\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use cms\Infrastructure\Abstractions\Criterias\CriteriaAbstract;

/**
 * Class EnvironmentsCriteria
 * @package cms\Domain\Users\Users\Criterias
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
				->join('environment_user AS uc_environments_eu', 'users.id', '=', 'uc_environments_eu.user_id')
				->join('environments AS uc_environments_e1', 'uc_environments_e1.id', '=', 'uc_environments_eu.environment_id')
				->whereIn('uc_environments_e1.id', $this->envs)
				->groupBy('users.id');
		}

		return $model;
	}
}
