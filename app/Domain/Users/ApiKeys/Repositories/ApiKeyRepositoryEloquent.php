<?php namespace cms\Domain\Users\ApiKeys\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use cms\Domain\Users\ApiKeys\Repositories\ApiKeyRepository;
use cms\Domain\Users\ApiKeys\ApiKey;
use cms\Domain\Users\Users\User;

/**
 * Class ApiKeyRepositoryEloquent
 * @package cms\Domain\Users\ApiKeys\Repositories
 */
class ApiKeyRepositoryEloquent extends BaseRepository implements ApiKeyRepository
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return ApiKey::class;
	}

	/**
	 * Boot up the repository, pushing criteria
	 */
	public function boot()
	{
		$this->pushCriteria(app(RequestCriteria::class));
	}

	public function generate_api_key(User $user, $level = 10, $ignore_limit = 0)
	{
		if (!is_null($user->apikeys))
		{
			foreach ($user->apikeys as $key)
			{
				$this->cancel_api_key($key->key);
			}
		}

		$this->create([
			'user_id'       => $user->id,
			'key'           => $this->model->generateKey(),
			'level'         => $level,
			'ignore_limits' => $ignore_limit,
		]);
	}

	public function cancel_api_key($key)
	{
		$this->findWhereIn('key', [$key])->first()->delete();
	}
}
