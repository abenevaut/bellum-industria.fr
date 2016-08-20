<?php namespace cms\Domain\Users\Users\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Container\Container as Application;
use CVEPDB\Settings\Facades\Settings;
use CVEPDB\Addresses\AddressesFacade;
use cms\Infrastructure\Interfaces\Repositories\RepositoryInterface;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\App\Services\Views\HtmlViews;
use cms\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;
use cms\Domain\Users\ApiKeys\Repositories\ApiKeyRepositoryEloquent;
use cms\Domain\Users\SocialTokens\Repositories\SocialTokenRepositoryEloquent;
use cms\Domain\Users\Permissions\Repositories\PermissionsRepositoryEloquent;

//use Core\Criterias\OnlyTrashedCriteria;
//use Core\Criterias\WithTrashedCriteria;
use cms\Domain\Users\Users\Criterias\EmailLikeCriteria;
use cms\Domain\Users\Users\Criterias\UserNameLikeCriteria;
use cms\Domain\Users\Users\Criterias\RolesCriteria;
use cms\Domain\Users\Users\Criterias\EnvironmentsCriteria;
use cms\Domain\Users\Users\Events\UserCreatedEvent;
use cms\Domain\Users\Users\Events\UserUpdatedEvent;
use cms\Domain\Users\Users\Events\UserDeletedEvent;
use cms\Domain\Users\Users\Events\NewUserCreatedEvent;
use cms\Domain\Users\Users\Events\NewAdminCreatedEvent;
use cms\Domain\Users\Users\Events\NewUserRegisteredEvent;
use cms\Domain\Users\Users\User;

/**
 * Class UserRepositoryEloquent
 * @package cms\Domain\Users\Users\Repositories
 */
class UserRepositoryEloquent extends RepositoryEloquentAbstract implements RepositoryInterface
{

	public $fields = [
		'users.id',
		'users.first_name',
		'users.last_name',
		'users.email',
		'users.deleted_at'
	];

	/**
	 * @var HtmlViews|null
	 */
	protected $htmlOutput = null;

	/**
	 * @var RolesRepositoryEloquent|null
	 */
	protected $r_roles = null;

	/**
	 * @var PermissionsRepositoryEloquent|null
	 */
	protected $r_permissions = null;

	/**
	 * @var ApiKeyRepositoryEloquent|null
	 */
	protected $r_apikey = null;

	/**
	 * @var SocialTokenRepositoryEloquent|null
	 */
	protected $r_social_tokens = null;

	/**
	 * UserRepositoryEloquent constructor.
	 *
	 * @param Application              $app
	 * @param RolesRepositoryEloquent  $r_roles
	 * @param ApiKeyRepositoryEloquent $r_apikey
	 */
	public function __construct(
		Application $app,
		HtmlViews $htmlOutput,
		RolesRepositoryEloquent $r_roles,
		PermissionsRepositoryEloquent $r_permissions,
		ApiKeyRepositoryEloquent $r_apikey,
		SocialTokenRepositoryEloquent $r_social_tokens
	)
	{
		parent::__construct($app);

		$this->htmlOutput = $htmlOutput;
		$this->htmlOutput->setCurrentModule('users::');

		$this->r_roles = $r_roles;
		$this->r_permissions = $r_permissions;
		$this->r_apikey = $r_apikey;
		$this->r_social_tokens = $r_social_tokens;
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
	 * @event cms\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \cms\Domain\Users\Users\User
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
	 * @event cms\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return \cms\Domain\Users\Users\User
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
	 * @event cms\Domain\Users\Users\Events\UserDeletedEvent
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

		$this->attach_user_to_role($user, RolesRepositoryEloquent::ADMIN);

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
		$role_admin = $this->r_roles->role_exists(RolesRepositoryEloquent::ADMIN);
		$role_user = $this->r_roles->role_exists(RolesRepositoryEloquent::USER);

		if (
			$user->roles->contains($role_admin->id)
			&& 1 === $this->r_roles->count_users_by_roles([
				RolesRepositoryEloquent::ADMIN
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
	 * @param \cms\Domain\Users\Users\User $user
	 * @param array                        $environments
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
	 * @param \cms\Domain\Users\Users\User $user
	 * @param array                        $roles
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
	 * @param \cms\Domain\Users\Users\User $user
	 * @param  array                       $addresses
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
	 * @event cms\Domain\Users\Users\Events\UserUpdatedEvent
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

	/**
	 * Validate a new user.
	 *
	 * @param array $user_data The new user information
	 *
	 * @return \Illuminate\Validation\Validator
	 */
	public function validateNewUser($user_data = [])
	{
		return Validator::make(
			$user_data,
			[
				'last_name'  => 'required|max:50',
				'first_name' => 'required|max:50',
				'email'      => 'required|email|max:255|unique:users',
				'password'   => 'required|confirmed|min:6',
			]
		);
	}

	/**
	 * Create a new user.
	 *
	 * @param array $user_data
	 *
	 * @return User
	 * @throws ValidationException
	 */
	public function registerNewUser($user_data = [])
	{
		$validator = $this->validateNewUser($user_data);

		if ($validator->passes())
		{
			$user = $this->create([
				'first_name' => $user_data['first_name'],
				'last_name'  => $user_data['last_name'],
				'email'      => $user_data['email'],
				'password'   => bcrypt($user_data['password']),
			]);

			$this->r_apikey->generate_api_key($user);

			// Always attach client role
			$role = $this->r_roles->role_exists(RolesRepositoryEloquent::USER);
			$user->attachRole($role);

			event(new NewUserRegisteredEvent($user));

			return $user;
		}
		throw new ValidationException($validator);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getUserLoginFrontEnd()
	{
		return $this->htmlOutput->output(
			'users.login',
			[
				'is_registration_allowed'
					=> Settings::get('users.is_registration_allowed'),
			]
		);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getUserRegistrationFrontEnd()
	{
		return $this->htmlOutput->output(
			'users.register',
			[
				'is_registration_allowed'
					=> Settings::get('users.is_registration_allowed'),
			]
		);
	}

}
