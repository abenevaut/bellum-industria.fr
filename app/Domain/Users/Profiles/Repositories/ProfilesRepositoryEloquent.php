<?php

namespace bellumindustria\Domain\Users\Profiles\Repositories;

use bellumindustria\Infrastructure\Contracts\Repositories\RepositoryEloquentAbstract;
use bellumindustria\Domain\Users\Profiles\Repositories\ProfilesRepositoryInterface;
use bellumindustria\Domain\Users\Profiles\Profile;

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
	 * Create user and fire event "UserCreatedEvent".
	 *
	 * @param array $attributes
	 *
	 * @event bellumindustria\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \bellumindustria\Domain\Users\Users\Profile
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
	 * @return \bellumindustria\Domain\Users\Users\Profile
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
		$user = parent::delete($id);

		event(new UserDeletedEvent($id));

		return $user;
	}

	/**
	 * Get the list of all user, active and soft deleted users.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function allWithTrashed()
	{
		return Profile::withTrashed()->get();
	}

	/**
	 * Get only user that was soft deleted.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function onlyTrashed()
	{
		return Profile::onlyTrashed()->get();
	}

	/**
	 * Filter users by roles id.
	 *
	 * @param array $roles Role(s) array
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByRoles($roles = [])
	{
		if (!is_null($roles) && !empty($roles) && is_array($roles))
		{
			$this->pushCriteria(new InRolesCriteria($roles));
		}

		return $this;
	}

	/**
	 * Filter users to show super-admin user only to others super-admins.
	 *
	 * @param bool $isCurrentUserSuperAdmin Is the current user a super-admin
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByRoleSuperAdmin($isCurrentUserSuperAdmin = false)
	{
		if (is_bool($isCurrentUserSuperAdmin))
		{
			$this
				->pushCriteria(
					new IsCurrentUserSuperAdmin($isCurrentUserSuperAdmin)
				);
		}

		return $this;
	}

	/**
	 * Filter users by name.
	 *
	 * @param string $name The user last name or user first name
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterByName($name)
	{
		if (!is_null($name) && !empty($name))
		{
			$this->pushCriteria(new NameLikeCriteria($name));
		}

		return $this;
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

	/**
	 * @return \Illuminate\Support\Collection
	 */
	public function getCivilitiesList()
	{
		return collect($this->civilities)
			->map(function ($translation_key, $civility_key)
			{
				return trans($translation_key);
			});
	}
}
