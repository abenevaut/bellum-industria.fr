<?php namespace Core\Domain\Environments\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Core\Domain\Environments\Entities\Environment;

/**
 * Class EnvironmentRepositoryEloquent
 * @package Core\Domain\Environments\Repositories
 */
class EnvironmentRepositoryEloquent extends BaseRepository implements EnvironmentRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Environment::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}
}
