<?php namespace cms\Domain\Users\Users\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use cms\Infrastructure\Abstractions\Criterias\CriteriaAbstract;

class UserNameLikeCriteria extends CriteriaAbstract
{

	/**
	 * @var string user first or last name
	 */
	private $name = null;

	/**
	 * @param string $name
	 */
	public function __construct($name = '') {
		$this->name = $name;
	}

	/**
	 * @param                     $model
	 * @param RepositoryInterface $repository
	 *
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository) {
		return $model->where(function($query)
		{
			$query
				->where('first_name', 'LIKE', '%' . $this->name . '%')
				->orwhere('last_name', 'LIKE', '%' . $this->name . '%');
		});
	}
}
