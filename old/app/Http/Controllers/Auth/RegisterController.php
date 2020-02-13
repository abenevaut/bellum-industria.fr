<?php

namespace bellumindustria\Http\Controllers\Auth;

use Illuminate\{
	Http\Request,
	Support\Facades\Validator,
	Foundation\Auth\RegistersUsers
};
use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Users\Users\{
	User,
	Repositories\UsersRepositoryEloquent
};

class RegisterController extends ControllerAbstract
{

	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * @var UsersRepositoryEloquent|null
	 */
	protected $r_users = null;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(UsersRepositoryEloquent $r_users) {
		$this->middleware('guest');
		$this->r_users = $r_users;
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		return $this->r_users->authRegistrationValidator($data);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array $data
	 *
	 * @return User
	 */
	protected function create(array $data) {
		// encrypt password
		$data['password'] = bcrypt($data['password']);
		$data['uniqid'] = uniqid();
		return $this->r_users->authRegistration($data);
	}

	/**
	 * The user has been registered.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  mixed  $user
	 * @return mixed
	 */
	protected function registered(Request $request, $user)
	{
		//
	}

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function showRegistrationForm() {
		return $this->r_users->frontendShowRegistrationForm();
	}
}
