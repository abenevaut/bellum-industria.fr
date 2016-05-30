<?php namespace Modules\Users\Http\Outputters;

use Core\Http\Outputters\FrontOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Modules\Users\Repositories\UserRepositoryEloquent;
use Modules\Users\Repositories\ApiKeyRepositoryEloquent;
use Modules\Users\Events\UserCreatedEvent;

/**
 * Class AuthOutputter
 * @package Modules\Users\Http\Outputters
 */
class AuthOutputter extends FrontOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'users::login.frontend_meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'users::login.frontend_meta_description';

	/**
	 * @var null UserRepositoryEloquent
	 */
	private $r_user = null;

	/**
	 * @var RoleRepositoryEloquent|null
	 */
	private $r_role = null;

	/**
	 * @var ApiKeyRepositoryEloquent|null
	 */
	private $r_apikey = null;

	/**
	 * AuthOutputter constructor.
	 *
	 * @param SettingsRepository       $_settings
	 * @param UserRepositoryEloquent   $r_user
	 * @param RoleRepositoryEloquent   $r_role
	 * @param ApiKeyRepositoryEloquent $r_apikey
	 */
	public function __construct(
	 SettingsRepository $_settings,
	 UserRepositoryEloquent $r_user,
	 RoleRepositoryEloquent $r_role,
	 ApiKeyRepositoryEloquent $r_apikey
) {
	
		parent::__construct($_settings);
		$this->r_user = $r_user;
		$this->r_role = $r_role;
		$this->r_apikey = $r_apikey;

		$this->set_current_module('users');
	}

	/**
	 * @param array $data
	 *
	 * @return mixed
	 * @throws \Exception
	 */
	public function create(array $data)
	{
		$user = $this->r_user->create([
			'first_name' => $data['first_name'],
			'last_name'  => $data['last_name'],
			'email'      => $data['email'],
			'password'   => bcrypt($data['password']),
		]);

		$this->r_apikey->generate_api_key($user);

		// Always attach client role
		$role = $this->r_role->role_exists(RoleRepositoryEloquent::USER);
		$user->attachRole($role);

		event(new UserCreatedEvent($user));

		return $user;
	}

	/**
	 *
	 */
	public function setLoginMeta()
	{
		$this->title = 'users::login.frontend_meta_title';
		$this->description = 'users::login.frontend_meta_description';
	}

	/**
	 *
	 */
	public function setRegisterMeta()
	{
		$this->title = 'users::register.frontend_meta_title';
		$this->description = 'users::register.frontend_meta_description';
	}
}
