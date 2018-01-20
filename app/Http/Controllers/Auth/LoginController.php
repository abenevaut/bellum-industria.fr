<?php

namespace bellumindustria\Http\Controllers\Auth;

use Illuminate\{
	Foundation\Auth\AuthenticatesUsers,
	Support\Facades\Auth
};
use Invisnik\LaravelSteamAuth\SteamAuth;
use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Controllers\Auth\AuthRedirectTrait;
use bellumindustria\Domain\Users\ProvidersTokens\ProviderToken;
use bellumindustria\Domain\Users\ProvidersTokens\Repositories\ProvidersTokensRepositoryEloquent;

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
	use AuthRedirectTrait;

	/**
	 * @var ProvidersTokensRepositoryEloquent|null
	 */
	protected $r_providers_tokens = null;

	/**
	 * @var SteamAuth
	 */
	private $steam;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(ProvidersTokensRepositoryEloquent $r_providers_tokens, SteamAuth $steam)
	{
		$this->middleware('guest', [
			'except' => [
				'logout',
				'redirectToProvider',
				'handleProviderCallback'
			]
		]);

		$this->r_providers_tokens = $r_providers_tokens;
		$this->steam = $steam;
	}

	/**
	 * Redirect the user to the OAuth Provider.
	 *
	 * @param $provider
	 *
	 * @return mixed
	 */
	public function redirectToProvider($provider)
	{
		if (ProviderToken::STEAM === $provider) {
			return $this->steam->redirect();
		}
		return \Socialite::driver($provider)->redirect();
	}

	/**
	 * Obtain the user information from provider.
	 *
	 * @param $provider
	 *
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 */
	public function handleProviderCallback($provider)
	{
		if (ProviderToken::STEAM === $provider) {
			if (!$this->steam->validate()) {
				return abort(403);
			}

			$providerUser = $this->steam->getUserInfo();
			$providerUser->id = $providerUser->steamID64;
			$providerUser->token = null;
		} else {
			$providerUser = \Socialite::driver($provider)->user();
		}

		if (!empty($providerUser) && \Auth::check()) {

			$isTokenAvailableForUser = $this
				->r_providers_tokens
				->checkIfTokenIsAvailableForUser(\Auth::user(), $providerUser->id, $provider);

			if ($isTokenAvailableForUser) {
				$this
					->r_providers_tokens
					->saveUserTokenForProvider(\Auth::user(), $provider, $providerUser->id, $providerUser->token);

				return redirect($this->redirectTo())
					->with(
						'message-success',
						sprintf(trans('auth.link_provider_success'), ucfirst(strtolower($provider)))
					);
			}

			return redirect($this->redirectTo())
				->with(
					'message-error',
					sprintf(trans('auth.link_provider_failed'), ucfirst(strtolower($provider)))
				);
		}

		$providerToken = $this
			->r_providers_tokens
			->findUserForProvider($providerUser->id, $provider);

		if (!is_null($providerToken)) {

			$this
				->r_providers_tokens
				->update(
					[
						'provider_token' => $providerUser->token
					],
					$providerToken->id
				);

			\Auth::login($providerToken->user, true);

			return redirect($this->redirectTo());
		}

		/*
		 * @xabe todo : try to link account via provider user mail, create token and login the user
		 * @xabe todo : if no account found redirect to registration form
		 */

		return redirect(route('login'))
			->with(
				'message-error',
				sprintf(trans('auth.login_with_provider_failed'), ucfirst(strtolower($provider)))
			);
	}
}
