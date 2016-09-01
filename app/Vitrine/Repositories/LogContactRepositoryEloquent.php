<?php namespace cms\Vitrine\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cms\Vitrine\Repositories\LogContactRepository;
use cms\Vitrine\Repositories\LogContact;

/**
 * Class LogContactRepositoryEloquent
 * @package cms\Vitrine\Repositories
 */
class LogContactRepositoryEloquent extends BaseRepository implements LogContactRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return LogContact::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}

}
