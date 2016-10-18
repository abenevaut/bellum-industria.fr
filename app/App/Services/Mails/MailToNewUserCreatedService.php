<?php namespace cms\App\Services\Mails;

use cms\App\Services\Mails\MailSendService;

/**
 * Class MailToNewUserCreatedService
 * @package cms\App\Services\Mails
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
