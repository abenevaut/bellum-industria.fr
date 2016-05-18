<?php namespace Core\Domain\Users\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Core\Domain\Users\Entities\SocialToken;

/**
 * Class SocialTokenRepositoryEloquent
 * @package Core\Domain\Users\Repositories
 */
class SocialTokenRepositoryEloquent extends BaseRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return SocialToken::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}

}
