<?php

namespace bellumindustria\Domain\Users\Users\Repositories;

use bellumindustria\Infrastructure\Contracts\{
	Repositories\RepositoryEloquentAbstract,
	Request\RequestAbstract
};
use bellumindustria\Domain\Users\Users\{
	User,
	Repositories\UsersRepositoryInterface,
	Events\UserCreatedEvent,
	Events\UserUpdatedEvent,
	Events\UserDeletedEvent,
	Presenters\UsersListPresenter,
	Criterias\EmailLikeCriteria,
};

class UsersRepositoryEloquent extends RepositoryEloquentAbstract implements UsersRepositoryInterface
{

	/**
	 * Specify Model class name
	 *
	 * @return string
	 */
	public function model()
	{
		return User::class;
	}

	/**
	 * Create user and fire event "UserCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Users\User
	 */
	public function create(array $attributes)
	{
		$user = parent::create($attributes);

		event(new UserCreatedEvent($user));

		return $user;
	}

	/**
	 * Update user and fire event "UserUpdatedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $user_id
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Users\User
	 */
	public function update(array $attributes, $user_id)
	{
		$user = parent::update($attributes, $user_id);

		event(new UserUpdatedEvent($user));

		return $user;
	}

	/**
	 * Delete user and fire event "UserDeletedEvent".
	 *
	 * @param array   $attributes
	 * @param integer $id
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserDeletedEvent
	 * @return int
	 */
	public function delete($id)
	{
		$user = $this->find($id);

		event(new UserDeletedEvent($user));

		return parent::delete($user->id);
	}

	/**
	 * Filter users by emails.
	 *
	 * @param string $email The user email
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByEmail($email)
	{
		if (!is_null($email) && !empty($email))
		{
			$this->pushCriteria(new EmailLikeCriteria($email));
		}

		return $this;
	}
}
