<?php namespace abenevaut\Domain\Users\Leads\Criterias;

use Prettus\Repository\Contracts\RepositoryInterface;
use abenevaut\Infrastructure\Contracts\Criterias\CriteriaAbstract;

class EmailLikeCriteria extends CriteriaAbstract
{

	/**
	 * @var string email
	 */
	private $email = null;

	/**
	 * @param string $email
	 */
	public function __construct($email = '')
	{
		$this->email = $email;
	}

	/**
	 * @param $model
	 * @param RepositoryInterface $repository
	 * @return mixed
	 */
	public function apply($model, RepositoryInterface $repository)
	{
		return $model->where('leads.email', 'LIKE', '%' . $this->email . '%');
	}
}
