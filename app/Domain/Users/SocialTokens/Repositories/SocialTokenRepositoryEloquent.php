<?php namespace cms\Domain\Users\SocialTokens\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\Domain\Users\SocialTokens\Repositories\SocialTokenRepository;
use cms\Domain\Users\SocialTokens\SocialToken;

/**
 * Class SocialTokenRepositoryEloquent
 * @package Core\Domain\Users\Repositories
 */
class SocialTokenRepositoryEloquent extends RepositoryEloquentAbstract implements SocialTokenRepository
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
