<?php

namespace bellumindustria\Domain\Users\Profiles\Repositories;

use bellumindustria\Infrastructure\Contracts\{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Users\Profiles\{
	Profile,
	Repositories\ProfilesRepositoryInterface,
	Events\ProfileCreatedEvent,
	Events\ProfileUpdatedEvent,
	Events\ProfileDeletedEvent,
};

class ProfilesRepositoryEloquent extends RepositoryEloquentAbstract implements ProfilesRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return Profile::class;
	}

	/**
	 * Create user and fire event "ProfileCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Users\Profiles\Events\ProfileUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Profiles\Profile
	 */
	public function create(array $attributes)
	{
		$profile = parent::create($attributes);

		event(new ProfileCreatedEvent($profile));

		return $profile;
	}

	/**
	 * Update user and fire event "ProfileUpdatedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $profile_id
	 *
	 * @event bellumindustria\Domain\Users\Profiles\Events\ProfileUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Profiles\Profile
	 */
	public function update(array $attributes, $profile_id)
	{
		$profile = parent::update($attributes, $profile_id);

		event(new ProfileUpdatedEvent($profile));

		return $profile;
	}

	/**
	 * Delete user and fire event "ProfileDeletedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Users\Profiles\Events\ProfileDeletedEvent
	 * @return int
	 */
	public function delete($id)
	{
		$profile = $this->find($id);

		event(new ProfileDeletedEvent($profile));

		return parent::delete($profile->id);
	}
}
