<?php namespace Ccms\Domain\Services;

use cms\Domain\Services\MailSendService;

/**
 * Class MailToNewUserCreatedService
 * @package Ccms\Domain\Services
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
