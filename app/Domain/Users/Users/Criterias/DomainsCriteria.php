<?php namespace cms\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use cms\Infrastructure\Abstractions\Criterias\CriteriaAbstract;

class DomainsCriteria extends CriteriaAbstract
{

	/**
	 * @var array envs list of domain IDs
	 */
	private $envs = [];

	/**
	 * @param array $envs
	 */
	public function __construct($envs = []) {
		$this->envs = array_filter($envs);
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository) {
		if (count($this->envs))
		{
			return $model
				->join('domain_user AS uc_domains_eu', 'users.id', '=', 'uc_domains_eu.user_id')
				->join('domains AS uc_domains_e1', 'uc_domains_e1.id', '=', 'uc_domains_eu.domain_id')
				->whereIn('uc_domains_e1.id', $this->envs)
				->groupBy('users.id');
		}

		return $model;
	}
}
