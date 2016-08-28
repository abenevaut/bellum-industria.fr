<?php namespace cms\Domain\Users\ApiKeys\Repositories;

use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\Domain\Users\ApiKeys\Repositories\ApiKeysRepository;
use cms\Domain\Users\ApiKeys\ApiKey;
use cms\Domain\Users\Users\User;

/**
 * Class ApiKeysRepositoryEloquent
 * @package cms\Domain\Users\ApiKeys\Repositories
 */
class ApiKeysRepositoryEloquent extends RepositoryEloquentAbstract implements ApiKeysRepository
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
