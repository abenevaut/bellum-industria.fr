<?php

namespace Modules\Users\Http\Controllers\Auth;

use CVEPDB\Settings\Facades\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Laravel\Socialite\Facades\Socialite;
use Core\Http\Controllers\CoreAuthController as Controller;
use Core\Domain\Users\Repositories\SocialTokenRepositoryEloquent;
use Core\Domain\Users\Entities\User;
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

		$social_login = Settings::get('users.social.login');
		$is_registration_allowed = Settings::get('users.is_registration_allowed');

		return $this->outputter->output(
			'users.login',
			[
				'social_login'            => $social_login,
				'is_registration_allowed' => $is_registration_allowed
			]
		);
	}

	/**
	 * Show the application registration form.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getRegister()
	{
		$this->outputter->setRegisterMeta();

		$social_login = Settings::get('users.social.login');
		$is_registration_allowed = Settings::get('users.is_registration_allowed');

		return $this->outputter->output(
			'users.register',
			[
				'social_login'            => $social_login,
				'is_registration_allowed' => $is_registration_allowed
			]
		);
	}

	/**
	 * Handle a registration request for the application.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function register(Request $request)
	{
		$validator = $this->validator($request->all());

		if ($validator->fails())
		{
			$this->throwValidationException(
				$request, $validator
			);
		}
		else
		{
			Session::flash('message-success', trans('auth.message_success_register'));
		}

		Auth::guard($this->getGuard())->login($this->create($request->all()));

		return redirect($this->redirectPath());
	}

	/**
	 * Get the post register / login redirect path.
	 *
	 * @return string
	 */
	public function redirectPath()
	{
		return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
	}

	/**
	 * Once authenticated on site
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param User                     $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function authenticated(\Illuminate\Http\Request $request, User $user)
	{
		$route = property_exists($this, 'redirectTo') ? $this->redirectTo : '/';

		if (\Auth::check() && \Auth::user()->hasRole('admin'))
		{
			$route = 'admin';
		}

		$request->session()->flash('message-success', trans('auth.message_success_loggedin'));

		return redirect()->intended($route);
	}

	/**
	 * Log the user out of the application.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function getLogout()
	{
		Session::flash('message-success', trans('auth.message_success_loggedout'));

		return $this->logout();
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
			if (Settings::get('users.is_registration_allowed'))
			{
				Session::set('register_from_social', [
					'token' => $social_user->token
				]);

				return redirect('register/' . $provider);
			}
			else
			{
				Session::flash('message-warning', trans('auth.message_warning_registration_not_allowed'));
			}
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
				'provider' => $provider,
				'uri'      => '/register/' . $provider
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

		// xABE Todo : check if email already exists, then redirect to link account

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

		Session::flash('message-success', trans('auth.message_success_provider_register_and_loggedin'));

		return redirect($this->redirectPath());
	}

}
