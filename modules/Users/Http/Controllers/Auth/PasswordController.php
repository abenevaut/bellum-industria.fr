<?php namespace Modules\Users\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Theme;
use Core\Http\Controllers\CoreAuthController as Controller;
use Core\Domain\Users\Entities\User;
use Core\Domain\Users\Events\UserUpdatedEvent;
use Modules\Users\Http\Outputters\PasswordOutputter;

class PasswordController extends Controller
{

	/*
	|--------------------------------------------------------------------------
	| Password Reset Controller
	|--------------------------------------------------------------------------
	|
	| This controller is responsible for handling password reset requests
	| and uses a simple trait to include this behavior. You're free to
	| explore this trait and override any methods you wish to tweak.
	|
	*/

	use ResetsPasswords;

	/**
	 * @var string View namespace ('users::'|<theme prefix>|null)
	 */
	protected $view_prefix = null;

	/**
	 * @var null
	 */
	protected $current_module = 'users::';

	/**
	 * @var PasswordOutputter|null
	 */
	private $outputter = null;

	/**
	 * Create a new password controller instance.
	 *
	 * @param PasswordOutputter $outputter
	 */
	public function __construct(PasswordOutputter $outputter)
	{
		parent::__construct();
		$this->middleware('guest');
		$this->outputter = $outputter;
		$this->subject = trans('passwords.mail_reset_password_title');
		$this->view_prefix = \Theme::getCurrent() . '::';
		$this->redirectTo = '/';
	}

	/**
	 * Display the form to request a password reset link.
	 *
	 * @return Response
	 */
	public function getEmail()
	{
		return $this->outputter->output('users.passwords.email');
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string $token
	 *
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token))
		{
			throw new NotFoundHttpException;
		}

		return $this->outputter->output('users.passwords.reset', ['token' => $token]);
	}

	/**
	 * Get the response for after a successful password reset.
	 *
	 * @param  string  $response
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	protected function getResetSuccessResponse($response)
	{
		Session::flash('message-success', trans('passwords.message_success_reset_password'));

		return redirect($this->redirectPath())->with('status', trans($response));
	}

	/**
	 * Reset the given user's password.
	 *
	 * @param  \Illuminate\Contracts\Auth\CanResetPassword  $user
	 * @param  string  $password
	 * @return void
	 */
	protected function resetPassword($user, $password)
	{
		$user->password = bcrypt($password);
		$user->save();

		/*
		 * $user is instance of \Core\Domain\Users\Entities\User
		 * Here we need instance of \Modules\Users\Entities\User
		 */

		$event_user = User::findOrFail($user->id);
		event(new UserUpdatedEvent($event_user));

		/*
		 * Log user in
		 */

		Auth::guard($this->getGuard())->login($user);
	}
}
