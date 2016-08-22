<?php namespace cms\Domain\Users\Users\Repositories;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Container\Container as Application;
use Laravel\Socialite\Facades\Socialite;
use CVEPDB\Settings\Facades\Settings;
use CVEPDB\Addresses\AddressesFacade;
use cms\Infrastructure\Interfaces\Repositories\RepositoryInterface;
use cms\Infrastructure\Abstractions\Repositories\RepositoryEloquentAbstract;
use cms\App\Services\Views\HtmlViews;
use cms\Domain\Environments\Environments\Repositories\EnvironmentsRepositoryEloquent;
use cms\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;
use cms\Domain\Users\Permissions\Repositories\PermissionsRepositoryEloquent;
use cms\Domain\Users\ApiKeys\Repositories\ApiKeyRepositoryEloquent;
use cms\Domain\Users\SocialTokens\Repositories\SocialTokenRepositoryEloquent;

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
	 * @var EnvironmentsRepositoryEloquent|null
	 */
	protected $r_environments = null;

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
		EnvironmentsRepositoryEloquent $r_environments,
		RolesRepositoryEloquent $r_roles,
		PermissionsRepositoryEloquent $r_permissions,
		ApiKeyRepositoryEloquent $r_apikey,
		SocialTokenRepositoryEloquent $r_social_tokens
	)
	{
		parent::__construct($app);

		$this->htmlOutput = $htmlOutput;
		$this->htmlOutput->setCurrentModule('users::');

		$this->r_environments = $r_environments;
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
		$user = $this->create([
			'first_name' => $first_name,
			'last_name'  => $last_name,
			'email'      => $email,
		]);

		$this->r_apikey->generate_api_key($user);

		// Always attach client role
		$this->set_user_roles($user, [
			RolesRepositoryEloquent::USER
		]);

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

		$this->set_user_roles($user, [
			RolesRepositoryEloquent::USER,
			RolesRepositoryEloquent::ADMIN
		]);

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
	 * @param array                        $environments_reference
	 *
	 * @return mixed
	 */
	public function set_user_environments(User $user, array $environments_reference = [])
	{
		if (count($environments_reference) > 0)
		{
			$environments_rows = $this->r_environments
				->findWhereIn('reference', $environments_reference);

			$user->environments()->detach();

			$environments_rows
				->each(function ($env) use (&$user)
				{
					$user->environments()->attach($env->id);
				});
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

			$roles_rows = $this->r_roles
				->findWhereIn('name', $roles);

			$user->roles()->detach();

			$roles_rows
				->each(function ($role) use (&$user)
				{
					$user->roles()->attach($role->id);
				});
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
	 * @param bool    $force
	 *
	 * @event cms\Domain\Users\Users\Events\UserUpdatedEvent
	 * @return bool
	 */
	public function set_user_password($user_id, $old_password, $new_password, $force = FALSE)
	{
		$user = $this->find($user_id);

		if (Hash::check($old_password, $user->password) || $force)
		{
			$data = [
				'password' => Hash::make($new_password)
			];

			$user->fill($data)->save();

			event(new UserUpdatedEvent($user));

			return TRUE;
		}

		return FALSE;
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
	public function registerNewUserWithRedirection(
		$user_data = [],
		$guard = null,
		$redirect_uri = '/'
	)
	{
		$validator = $this->validateNewUser($user_data);

		if ($validator->passes())
		{
			$user = $this->create_user(
				$user_data['first_name'],
				$user_data['last_name'],
				$user_data['email']
			);

			$this->set_user_password($user->id, '', $user_data['password']);

			$this->r_apikey->generate_api_key($user);

			event(new NewUserRegisteredEvent($user));

			Auth::guard($guard)->login($user);

			return redirect($redirect_uri);
		}
		throw new ValidationException($validator);
	}

	/**
	 * @param string $uri
	 *
	 * @return string
	 */
	public function redirectAfterAuthentication(
		Request $request,
		User $user,
		$redirect_uri = '/'
	)
	{
		if (
			$user->hasRole(RolesRepositoryEloquent::ADMIN)
			|| $user->hasPermission(PermissionsRepositoryEloquent::ACCESS_ADMIN_PANEL)
		)
		{
			$redirect_uri = 'admin';
		}
		else if ($user->hasRole(RolesRepositoryEloquent::USER))
		{
			$redirect_uri = $redirect_uri;
		}
		else
		{
			// xABE Todo : An account non-linked to an env have to be activated
			// xABE Todo : shared session between envs
			$redirect_uri = $redirect_uri;
		}

		return redirect()->intended($redirect_uri);
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
	public function getUserLoginBackEnd()
	{
		return $this->htmlOutput->output(
			'users.admin.login',
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

	/**
	 * @param $provider
	 *
	 * @return mixed
	 */
	public function redirectToProviderForAuthentification($provider)
	{
		$provider = Socialite::driver($provider);

		// linkedin
		// $provider->scopes(['r_basicprofile', 'r_emailaddress', 'w_share']);

		// facebook
		// $provider->scopes(['public_profile', 'email', 'publish_actions'])

		// twitter
		// $provider->scopes([])

		return $provider->redirect();
	}

	/**
	 * @param        $provider
	 * @param string $redirect_uri
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function handleProviderCallbackForAuthentificationWithRedirect(
		$provider,
		$redirect_uri = '/'
	)
	{
		$social_user = Socialite::driver($provider)->user();

		$social_token = $this->r_social_tokens->findByField(
			'token',
			$social_user->token
		)->first();

		if (!is_null($social_token))
		{
			$user = $this->find($social_token->user_id);

			Auth::login($user);

			event(new Login($user, TRUE));
		}
		else
		{
			if (Auth::check())
			{
				$this->r_social_tokens->create([
					'provider' => $provider,
					'token'    => $social_user->token,
					'user_id'  => Auth::user()->id
				]);

				session()->flash('message-success', trans('auth.message_success_provider_linked'));
			}
			else if (Settings::get('users.is_registration_allowed'))
			{
				session()->set('register_from_social', [
					'token' => $social_user->token
				]);

				return redirect('register/' . $provider);
			}
			else
			{
				session()->flash('message-warning', trans('auth.message_warning_registration_not_allowed'));
			}
		}

		return redirect($redirect_uri);
	}

	/**
	 * @param $provider
	 *
	 * @return mixed
	 */
	public function getRegisterFromProvider($provider)
	{
		return $this->htmlOutput->output(
			'users.register',
			[
				'provider' => $provider,
				'uri'      => '/register/' . $provider
			]
		);
	}

	/**
	 * @param Request $request
	 * @param         $provider
	 * @param         $redirect_uri
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws ValidationException
	 */
	public function postRegisterFromProviderWithRedirect(
		Request $request,
		$provider,
		$redirect_uri
	)
	{
		// xABE Todo : check if email already exists, then redirect to link account

		$validator = $this->validateNewUser($request->all());

		if ($validator->passes())
		{
			$user = $this->create($request->all());

			$social_user = session()->get('register_from_social');

			// xABE Todo : check token doesn't exist - no duplicate token

			$this->r_social_tokens->create([
				'provider' => $provider,
				'token'    => $social_user['token'],
				'user_id'  => $user->id
			]);

			Auth::guard($this->getGuard())->login($user);

			session()->set('register_from_social', []);

			session()->flash(
				'message-success',
				trans('auth.message_success_provider_register_and_loggedin')
			);

			return redirect($redirect_uri);
		}
		throw new ValidationException($validator);
	}

}
