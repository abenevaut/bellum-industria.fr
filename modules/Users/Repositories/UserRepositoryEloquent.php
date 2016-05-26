<?php namespace Modules\Users\Repositories;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Container\Container as Application;
use Core\Domain\Users\Repositories\UserRepositoryEloquent as UserRepositoryEloquentParent;
use Modules\Users\Entities\User;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Modules\Users\Events\Admin\UserUpdatedEvent;

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
	 * Update user and fire event "UserUpdatedEvent".
	 *
	 * @param array $attributes
	 * @param       $user_id
	 *
	 * @event Modules\Users\Events\Admin\UserUpdatedEvent
	 * @return mixed
	 */
	public function update(array $attributes, $user_id)
	{
		$user = parent::update($attributes, $user_id);

		event(new UserUpdatedEvent($user));

		return $user;
	}

	/**
	 * Change user password and fire event "UserUpdatedEvent".
	 *
	 * @param $user_id
	 * @param $old_password
	 * @param $new_password
	 *
	 * @event Modules\Users\Events\Admin\UserUpdatedEvent
	 * @return bool
	 */
	public function change_password($user_id, $old_password, $new_password)
	{
		$user = $this->find($user_id);

		if (Hash::check($old_password, $user->password))
		{
			$data = [
				'password' => Hash::make($new_password)
			];

			$user->fill($data)->save();

			event(new UserUpdatedEvent($user));

			return true;
		}
		return false;
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
