<?php namespace Modules\Users\Repositories;

use Illuminate\Support\Facades\Password;
use Illuminate\Container\Container as Application;
use Core\Domain\Users\Repositories\UserRepositoryEloquent as UserRepositoryEloquentParent;
use Modules\Users\Entities\User;
use Modules\Users\Repositories\RoleRepositoryEloquent;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends UserRepositoryEloquentParent
{

	/**
	 * UserRepositoryEloquent constructor.
	 *
	 * @param Application                                        $app
	 * @param \Modules\Users\Repositories\RoleRepositoryEloquent $r_roles
	 */
	public function __construct(Application $app, RoleRepositoryEloquent $r_roles)
	{
		parent::__construct($app, $r_roles);
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
	 * Allow to send the reset password link by mail via PasswordBroker.
	 *
	 * @param $user_id
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
}
