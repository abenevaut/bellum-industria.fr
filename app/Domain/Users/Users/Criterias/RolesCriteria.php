<?php namespace cms\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use cms\Infrastructure\Abstractions\Criterias\CriteriaAbstract;

class RolesCriteria extends CriteriaAbstract
{

	/**
	 * @var array roles list of roles IDs
	 */
	private $roles = [];

	/**
	 * @param array $roles
	 */
	public function __construct($roles = []) {
		$this->roles = array_filter($roles);
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository) {
		if (count($this->roles))
		{
			return $model->whereIn('role', $this->roles);
		}

		return $model;
	}
}
