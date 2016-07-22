<?php namespace cms\Infrastructure\Contracts\Repositories;

use Illuminate\Container\Container as Application;
use Illuminate\Database\Eloquent\Builder;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cms\Infrastructure\Interfaces\Repositories\RepositoryInterface;

/**
 * Class RepositoryEloquentAbstract
 * @package cms\Infrastructure\Contracts\Repositories
 */
abstract class RepositoryEloquentAbstract extends BaseRepository implements RepositoryInterface
{
	/**
	 * RepositoryEloquentAbstract constructor.
	 */
	public function __construct(Application $app)
	{
		parent::__construct($app);
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}

	/**
	 * Count all item, based on active criterias.
	 *
	 * @param array $columns
	 *
	 * @return int
	 */
	public function count($columns = ['*'])
	{
		$this->applyCriteria();
		$this->applyScope();

		if ($this->model instanceof Builder)
		{
			$results = $this->model->get($columns)->count();
		}
		else
		{
			$results = $this->model->count($columns);
		}

		$this->resetModel();
		$this->resetScope();

		return $results;
	}

}
