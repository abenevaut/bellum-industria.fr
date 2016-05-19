<?php namespace Modules\Steam\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Core\Http\Controllers\CorePublicController as Controller;
use Core\Domain\Users\Repositories\SocialTokenRepositoryEloquent;
use Modules\Steam\Entities\User;
use Modules\Steam\Repositories\SteamAuth;

/**
 * Class AuthController
 * @package Modules\Steam
 */
class AuthController extends Controller
{

	/**
	 * @var SteamAuth
	 */
	private $steam;

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/';

	/**
	 * @var SocialTokenRepositoryEloquent|null
	 */
	private $r_socialtoken = null;

	/**
	 * AuthController constructor.
	 *
	 * @param SteamAuth                     $steam
	 * @param SocialTokenRepositoryEloquent $r_user
	 */
	public function __construct(
		SteamAuth $steam,
		SocialTokenRepositoryEloquent $r_socialtoken
	)
	{
		parent::__construct();

		$this->steam = $steam;
		$this->r_socialtoken = $r_socialtoken;
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
	 * @throws \Exception
	 */
	public function login()
	{

		if ($this->steam->validate())
		{
			$social_user = $this->steam->getUserInfo();

			$social_token = $this->r_socialtoken->findByField(
				'token',
				$social_user->getSteamID64()
			)->first();

			if (!is_null($social_token))
			{
				$user = User::find($social_token->user_id);

				Auth::login($user);

				Session::flash('message-success', trans('auth.message_success_provider_loggedin'));

				return redirect(property_exists($this, 'redirectTo') ? $this->redirectTo : '/');
			}
			else
			{
				Session::set('register_from_social', [
					'token' => $social_user->getSteamID64()
				]);

				return redirect('register/steam');
			}
		}

		return $this->steam->redirect('/');
	}

}
