<?php

namespace bellumindustria\Domain\Users\Users\Repositories;

use Illuminate\Container\Container as Application;
use bellumindustria\Infrastructure\Contracts\Repositories\RepositoryEloquentAbstract;
use bellumindustria\Infrastructure\Contracts\Request\RequestAbstract;
use bellumindustria\Domain\Users\Users\Repositories\UsersRepositoryInterface;
use bellumindustria\Domain\Users\Users\Presenters\{
	UsersListPresenter,
	AjaxCheckUserEmailPresenter
};
use bellumindustria\Domain\Users\Profiles\Repositories\ProfilesRepositoryEloquent;
use bellumindustria\Domain\Users\Users\Criterias\{
	InRolesCriteria,
	EmailLikeCriteria,
	NameLikeCriteria,
	IsCurrentUserSuperAdmin
};
use bellumindustria\Domain\Users\Users\User;
use bellumindustria\Domain\Users\Users\Events\{
	UserCreatedEvent,
	UserUpdatedEvent,
	UserDeletedEvent,
	UserTriedToDeleteHisOwnAccountEvent
};

class UsersRepositoryEloquent extends RepositoryEloquentAbstract implements UsersRepositoryInterface
{

	/**
	 * @var null|RolesRepositoryEloquent
	 */
	protected $r_roles = null;

	/**
	 * @var null
	 */
	protected $r_profiles = null;

	/**
	 * @var null|ContactsRepositoryEloquent
	 */
	protected $r_customers_contacts = null;

	/**
	 * @var null|TrainersRepositoryEloquent
	 */
	protected $r_trainings_trainers = null;

	/**
	 * @var array Civilities available to fill civility field in users table.
	 */
	protected $civilities = [
		User::USERS_CIVILITIES_MADAM  => 'users.civilities.' . User::USERS_CIVILITIES_MADAM,
		User::USERS_CIVILITIES_MISS   => 'users.civilities.' . User::USERS_CIVILITIES_MISS,
		User::USERS_CIVILITIES_MISTER => 'users.civilities.' . User::USERS_CIVILITIES_MISTER,
	];

	/**
	 * UsersRepositoryEloquent constructor.
	 *
	 * @param Application                $app
	 * @param RolesRepositoryEloquent    $r_roles
	 * @param ProfilesRepositoryEloquent $r_profiles
	 */
	public function __construct(
		Application $app,
		RolesRepositoryEloquent $r_roles,
		ProfilesRepositoryEloquent $r_profiles
	)
	{
		parent::__construct($app);

		$this->r_roles = $r_roles;
		$this->r_profiles = $r_profiles;

		$this->r_customers_contacts = new ContactsRepositoryEloquent(
			$this->app,
			$this
		);

		$this->r_trainings_trainers = new TrainersRepositoryEloquent(
			$this->app,
			$this,
			new SkillsDomainsRepositoryEloquent($this->app),
			new TrainersEarningsRepositoryEloquent($this->app),
			new SkillsDomainsExpertisesRepositoryEloquent($this->app),
			new SkillsDomainsDiplomasRepositoryEloquent($this->app)
		);
	}

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
		return User::withTrashed()->get();
	}

	/**
	 * Get only user that was soft deleted.
	 *
	 * @return \Illuminate\Database\Eloquent\Collection
	 */
	public function onlyTrashed()
	{
		return User::onlyTrashed()->get();
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
