<?php namespace Core\Domain\Users\Services;

use Core\Services\MailSendService;

/**
 * Class MailToNewUserCreatedService
 * @package Core\Domain\Users\Services
 */
class MailToNewUserCreatedService extends MailSendService
{

	public function ez($user)
	{
		$this->emailTo(
			$user->email,
			'users::users.emails.admin.newuser',
			'Admin created your account',
			[
				'user' => $user
			]
		);
	}
}
