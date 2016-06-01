<?php namespace Core\Domain\Users\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Container\Container as Application;
use CVEPDB\Domain\Users\Repositories\UserRepositoryEloquent as CVEPDBUserRepositoryEloquent;
use CVEPDB\Addresses\AddressesFacade;
use Core\Criterias\OnlyTrashedCriteria;
use Core\Criterias\WithTrashedCriteria;
use Core\Domain\Users\Entities\User;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Core\Domain\Users\Criterias\EmailLikeCriteria;
use Core\Domain\Users\Criterias\UserNameLikeCriteria;
use Core\Domain\Users\Criterias\RolesCriteria;
use Core\Domain\Users\Criterias\EnvironmentsCriteria;
use Core\Domain\Users\Events\UserCreatedEvent;
use Core\Domain\Users\Events\UserUpdatedEvent;
use Core\Domain\Users\Events\UserDeletedEvent;
use Core\Domain\Users\Events\NewUserCreatedEvent;
use Core\Domain\Users\Events\NewAdminCreatedEvent;

/**
 * Class UserRepositoryEloquent
 * @package Core\Domain\Users\Repositories
 */
class UserRepositoryEloquent extends CVEPDBUserRepositoryEloquent
{

	/**
	 * @var ApiKeyRepositoryEloquent|null
	 */
	protected $r_apikey = null;

	/**
	 * UserRepositoryEloquent constructor.
	 *
	 * @param Application            $app
	 * @param RoleRepositoryEloquent $r_roles
	 */
	public function __construct(
		Application $app,
		RoleRepositoryEloquent $r_roles,
		ApiKeyRepositoryEloquent $r_apikey
	)
	{
		parent::__construct($app, $r_roles);

		$this->r_apikey = $r_apikey;
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
	 * @event Core\Domain\Users\Events\UserUpdatedEvent
	 * @return \Core\Domain\Users\Entities\User
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
	 * @event Core\Domain\Users\Events\UserUpdatedEvent
	 * @return \Core\Domain\Users\Entities\User
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
	 * @param integer $user_id
	 *
	 * @event Core\Domain\Users\Events\UserDeletedEvent
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
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function onlyTrashed()
	{
		return User::onlyTrashed()->get();
	}

	/**
	 * Count all user, based on active criterias.
	 *
	 * @param array $columns
	 *
	 * @return int
	 */
	public function count($columns = ['*'])
	{
		$this->applyCriteria();
		$this->applyScope();

		if ($this->model instanceof Builder)
		{
			$results = $this->model->get($columns)->count();
		}
		else
		{
			$results = $this->model->count($columns);
		}

		$this->resetModel();
		$this->resetScope();

		return $results;
	}

	/**
	 * Filter users by name.
	 *
	 * @param string $name The user last name or user first name
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterUserName($name)
	{
		$this->pushCriteria(new UserNameLikeCriteria($name));
	}

	/**
	 * Filter users by emails.
	 *
	 * @param string $email The user email
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterEmail($email)
	{
		$this->pushCriteria(new EmailLikeCriteria($email));
	}

	/**
	 * Filter users by roles.
	 *
	 * @param array $roles the list of roles IDs
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterRoles($roles = [])
	{
		$roles = array_filter($roles);

		if (count($roles))
		{
			$this->pushCriteria(new RolesCriteria($roles));
		}
	}

	/**
	 * Display all users with trashed users.
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterShowWithTrashed()
	{
		$this->pushCriteria(new WithTrashedCriteria());
	}

	/**
	 * Display only trashed user.
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterShowOnlyTrashed()
	{
		$this->pushCriteria(new OnlyTrashedCriteria());
	}

	/**
	 * Filter users by environments.
	 *
	 * @param array $envs the list of environment IDs
	 *
	 * @throws \Prettus\Repository\Exceptions\RepositoryException
	 */
	public function filterEnvironments($envs = [])
	{
		$envs = array_filter($envs);

		if (count($envs))
		{
			$this->pushCriteria(new EnvironmentsCriteria($envs));
		}
	}

	/**
	 * Create a new user with role RoleRepository::USER.
	 *
	 * @param string $first_name
	 * @param string $last_name
	 * @param string $email
	 *
	 * @return mixed
	 */
	public function create_user($first_name, $last_name, $email)
	{
		$user = parent::create_user($first_name, $last_name, $email);

		$this->r_apikey->generate_api_key($user);

		event(new NewUserCreatedEvent($user));

		return $user;
	}

	/**
	 * Create a new user with role RoleRepository::ADMIN.
	 *
	 * @param string $first_name
	 * @param string $last_name
	 * @param string $email
	 *
	 * @return mixed
	 */
	public function create_admin($first_name, $last_name, $email)
	{
		$user = $this->create_user($first_name, $last_name, $email);

		$this->attach_user_to_role($user, RoleRepositoryEloquent::ADMIN);

		event(new NewAdminCreatedEvent($user));

		return $user;
	}

	/**
	 * Find user by ID and soft delete him.
	 *
	 * @param integer $user_id The user ID
	 *
	 * @throws \Exception
	 */
	public function findAndDelete($user_id)
	{
		if ($user_id == Auth::user()->id)
		{
			throw new \Exception(
				trans('repositories.users.findanddelete:you_can_not_delete_your_account'),
				1
			);
		}

		$user = $this->find($user_id);
		$role_admin = $this->r_roles->role_exists(RoleRepositoryEloquent::ADMIN);
		$role_user = $this->r_roles->role_exists(RoleRepositoryEloquent::USER);

		if (
			$user->roles->contains($role_admin->id)
			&& 1 === $this->r_roles->count_users_by_roles([
				RoleRepositoryEloquent::ADMIN
			])
		)
		{
			throw new \Exception(
				sprintf(
					trans('repositories.users.findanddelete:this_is_the_last_user_admin'),
					$user->full_name
				),
				1
			);
		}

		/*
		 * delete all roles except user; in case the user was re-activated
		 */

		$user->roles()->detach();
		$user->roles()->attach($role_user);

		/*
		 * delete api key
		 */

		$user->apikey()->delete();

		/*
		 * delete user
		 */

		$this->delete($user_id);
	}

	/**
	 * @param \Core\Domain\Users\Entities\User $user
	 * @param array                            $environments
	 *
	 * @return mixed
	 */
	public function set_user_environments(User $user, array $environments = [])
	{
		if (count($environments) > 0)
		{
			$user->environments()->detach();
			$user->environments()->attach($environments);
		}

		return $user;
	}

	/**
	 * @param \Core\Domain\Users\Entities\User $user
	 * @param array                            $roles
	 *
	 * @return mixed
	 */
	public function set_user_roles(User $user, array $roles = [])
	{
		if (count($roles) > 0)
		{

			// xABE Todo : add role(s) for selected environment(s)

			$user->roles()->attach($roles);
		}

		return $user;
	}

	/**
	 * @param \Core\Domain\Users\Entities\User $user
	 * @param  array                           $addresses
	 *
	 * @return null
	 */
	public function set_user_addresses(User $user, array $addresses)
	{
		$validator = null;

		$primary_address = array_key_exists('primary', $addresses)
			? $addresses['primary']
			: [];

		/**
		 * Check addresses values
		 *
		 * If primary address registered and not others, use primary foreach addresses
		 */
		foreach ($addresses as $type => $address)
		{
			$validator = AddressesFacade::getValidator($address);

			if (!$validator->fails())
			{
				AddressesFacade::createAddress($address, $user->id);
			}
			else
			{
				break;
			}
		}

		return $validator;
	}

	/**
	 * Change user password and fire event "UserUpdatedEvent".
	 *
	 * @param integer $user_id The user ID
	 * @param string  $old_password
	 * @param string  $new_password
	 *
	 * @event Core\Domain\Users\Events\UserUpdatedEvent
	 * @return bool
	 */
	public function set_user_password($user_id, $old_password, $new_password)
	{
		$user = $this->find($user_id);

		if (Hash::check($old_password, $user->password))
		{
			$data = [
				'password' => Hash::make($new_password)
			];

			$user->fill($data)->save();

			event(new UserUpdatedEvent($user));

			return true;
		}

		return false;
	}

	/**
	 * Allow to send the reset password link by mail via PasswordBroker.
	 *
	 * @param integer $user_id The user ID
	 *
	 * @return mixed
	 */
	public function send_reset_password_link($user_id)
	{
		$broker = null;

		$user = $this->find($user_id);

		return Password::broker($broker)->sendResetLink(
			[
				'email' => $user->email
			],
			function (Message $message)
			{
				$message->subject(trans('passwords.mail_reset_password_title'));
			}
		);
	}
}
