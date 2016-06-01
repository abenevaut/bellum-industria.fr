<?php namespace Modules\Users\Http\Controllers\Admin;

use CVEPDB\Settings\Facades\Settings;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Core\Http\Controllers\CoreAuthController as Controller;
use Modules\Users\Http\Outputters\Admin\AuthOutputter;
use Core\Domain\Users\Entities\User;

/**
 * Class AuthController
 * @package Modules\Users\Http\Controllers\Admin
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
	protected $redirectTo = 'admin';

	/**
	 * @var AuthOutputter|null
	 */
	private $outputter = null;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param AuthOutputter $outputter
	 */
	public function __construct(AuthOutputter $outputter)
	{
		parent::__construct();
		$this->middleware('guest', ['except' => ['logout', 'getLogout']]);
		$this->outputter = $outputter;
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
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function getLogin()
	{
		return $this->outputter->output('users.admin.login');
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
	 * Once authenticated on site
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param User                     $user
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function authenticated(Request $request, User $user)
	{
		$route = property_exists($this, 'redirectTo') ? $this->redirectTo : '/';

		if (Auth::check() && Auth::user()->hasRole('admin'))
		{
			$route = 'admin';
		}

		$request->session()->flash('message-success', trans('auth.message_success_loggedin'));

		return redirect()->intended($route);
	}

}
