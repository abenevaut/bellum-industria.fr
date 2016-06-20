<?php namespace Core\Domain\Environments\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Core\Domain\Environments\Entities\Environment;
use Core\Domain\Environments\Events\EnvironmentCreatedEvent;
use Core\Domain\Environments\Events\EnvironmentDeletedEvent;
use Core\Domain\Environments\Events\EnvironmentUpdatedEvent;

/**
 * Class EnvironmentRepositoryEloquent
 * @package Core\Domain\Environments\Repositories
 */
class EnvironmentRepositoryEloquent extends BaseRepository implements EnvironmentRepository
{

	const DEFAULT_ENVIRONMENT_REFERENCE = 'default';

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

	/**
	 * Create user and fire event "UserCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event Core\Domain\Users\Events\UserUpdatedEvent
	 * @return \Core\Domain\Users\Entities\User
	 */
	public function create(array $attributes)
	{
		$environment = parent::create($attributes);

		event(new EnvironmentCreatedEvent($environment));

		return $environment;
	}

	/**
	 * Update user and fire event "UserUpdatedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $user_id
	 *
	 * @event Core\Domain\Users\Events\UserUpdatedEvent
	 * @return \Core\Domain\Users\Entities\User
	 */
	public function update(array $attributes, $user_id)
	{
		$environment = parent::update($attributes, $user_id);

		event(new EnvironmentUpdatedEvent($environment));

		return $environment;
	}

	/**
	 * Delete user and fire event "UserDeletedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $user_id
	 *
	 * @event Core\Domain\Users\Events\UserDeletedEvent
	 * @return int
	 */
	public function delete($id)
	{
		$environment = parent::delete($id);

		event(new EnvironmentDeletedEvent($id));

		return $environment;
	}

	/**
	 * Return complete domain from an URL.
	 *
	 * @param string $url
	 *
	 * @return string
	 */
	public function get_domain_from_url($url)
	{
		return parse_url($url, PHP_URL_HOST);
	}
}
