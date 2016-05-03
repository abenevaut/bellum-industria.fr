<?php namespace Modules\Users\Services;

use Core\Services\MailSendService;

/**
 * Class MailToNewUserCreatedService
 * @package Modules\Users\Services
 */
class MailPasswordResetService extends MailSendService
{
	/**
	 * @param $email
	 * @param $view
	 * @param $data
	 */
	public function send($email, $view, $data)
	{
		$this->emailTo(
			$email,
			$view,
			trans('passwords.mail_reset_password_title'),
			$data
		);
	}
}
