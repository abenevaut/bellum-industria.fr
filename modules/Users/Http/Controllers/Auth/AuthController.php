<?php

namespace Modules\Users\Http\Controllers\Auth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Core\Http\Controllers\CoreAuthController as Controller;
use Core\Domain\Users\Repositories\SocialTokenRepositoryEloquent;
use Modules\Users\Entities\User;
use Modules\Users\Http\Outputters\AuthOutputter;

/**
 * Class AuthController
 * @package Modules\Users\Http\Controllers\Auth
 */
class AuthController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers, ThrottlesLogins;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * @var AuthOutputter|null
	 */
	private $outputter = null;

	/**
	 * @var SocialTokenRepositoryEloquent|null
	 */
	private $r_socialtoken = null;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param AuthOutputter $outputter
	 */
	public function __construct(
		AuthOutputter $outputter,
		SocialTokenRepositoryEloquent $r_socialtoken
	)
	{
		parent::__construct();
		$this->middleware('guest', ['except' => ['logout', 'getLogout']]);
		$this->outputter = $outputter;
		$this->r_socialtoken = $r_socialtoken;
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array $data
	 *
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'last_name'  => 'required|max:50',
			'first_name' => 'required|max:50',
			'email'      => 'required|email|max:255|unique:users',
			'password'   => 'required|confirmed|min:6',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array $data
	 *
	 * @return User
	 */
	protected function create(array $data)
	{
		return $this->outputter->create($data);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getLogin()
	{
		$this->outputter->setLoginMeta();

		return $this->outputter->output('users.login');
	}

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		$this->outputter->setRegisterMeta();

		return $this->outputter->output('users.register');
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		Session::flash('message', trans('auth.message_success_loggedin'));

		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
	}

	/**
	 * Redirect the user to a provider authentication page.
	 *
	 * @return Response
	 */
	public function redirectToProvider($provider)
	{
		return Socialite::driver($provider)->redirect();
	}

	/**
	 * Obtain the user information from a provider.
	 *
	 * @return Response
	 */
	public function handleProviderCallback($provider)
	{
		$social_user = Socialite::driver($provider)->user();

		$social_token = $this->r_socialtoken->findByField(
			'token',
			$social_user->token
		)->first();

		if (!is_null($social_token))
		{
			$user = User::find($social_token->user_id);
			
			Auth::login($user);

			Session::flash('message-success', trans('auth.message_success_provider_loggedin'));
		}
		else
		{
			Session::set('register_from_social', [
				'token' => $social_user->token
			]);

			return redirect('register/' . $provider);
		}

		return redirect(property_exists($this, 'redirectTo') ? $this->redirectTo : '/');
	}

	/**
	 * @param $provider
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getRegisterFromProvider($provider)
	{
		$this->outputter->setRegisterMeta();

		return $this->outputter->output(
			'users.register',
			[
				'uri' => '/register/' . $provider
			]
		);
	}

	/**
	 * @param Request $request
	 * @param         $provider
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Illuminate\Foundation\Validation\ValidationException
	 */
	public function postRegisterFromProvider(Request $request, $provider)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request,
				$validator
			);
		}

		$user = $this->create($request->all());

		$social_user = Session::get('register_from_social');

		// xABE Todo : check token doesn't exist - no duplicate token

		$this->r_socialtoken->create([
			'provider' => $provider,
			'token'    => $social_user['token'],
			'user_id'  => $user->id
		]);

		Auth::guard($this->getGuard())->login($user);

		Session::set('register_from_social', []);

		return redirect($this->redirectPath());
	}

}
