<?php

namespace bellumindustria\Http\Controllers\Auth;

use Illuminate\{
	Foundation\Auth\AuthenticatesUsers,
	Support\Facades\Auth
};
use Invisnik\LaravelSteamAuth\SteamAuth;
use Laravel\Socialite\Facades\Socialite;
use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;

class LoginController extends ControllerAbstract
{

	/*
	|--------------------------------------------------------------------------
	| Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles authenticating users for the application and
	| redirecting them to your home screen. The controller uses a trait
	| to conveniently provide its functionality to your applications.
	|
	*/

	use AuthenticatesUsers;

	/**
	 * Where to redirect users after login.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * @var SteamAuth
	 */
	private $steam;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(SteamAuth $steam) {
		$this
			->middleware('guest')
			->except('logout');

		$this->steam = $steam;
	}

	/**
	 * Redirect the user to the OAuth Provider.
	 *
	 * @param $provider
	 *
	 * @return mixed
	 */
	public function redirectToProvider($provider) {
		return Socialite::driver($provider)->redirect();
	}

	/**
	 * Obtain the user information from provider.
	 *
	 * @param $provider
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function handleProviderCallback($provider) {
		$user = Socialite::driver($provider)->user();

		dd($user);

		$authUser = $this->findOrCreateUser($user, $provider);
		Auth::login($authUser, true);

		return redirect($this->redirectTo);
	}

	/**
	 * Redirect the user to the OAuth Steam.
	 *
	 * @return Response
	 */
	public function redirectToSteam() {
		return $this->steam->redirect(); // redirect to Steam login page
	}

	/**
	 * Obtain the user information from steam provider.
	 *
	 * @return Response
	 */
	public function handleSteamCallback() {
		if ($this->steam->validate())
		{

			$info = $this->steam->getUserInfo();

			dd($info);

			if (!is_null($info))
			{
				$user = User::where('steamid', $info->steamID64)->first();
				if (is_null($user))
				{
					$user = User::create([
						'username' => $info->personaname,
						'avatar'   => $info->avatarfull,
						'steamid'  => $info->steamID64
					]);
				}

				Auth::login($user, true);

				return redirect('/'); // redirect to site
			}
		}

		return abort(403);
	}
}
