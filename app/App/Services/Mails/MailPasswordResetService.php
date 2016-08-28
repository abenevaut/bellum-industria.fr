<?php namespace cms\App\Services\Mails;

use cms\App\Services\Mails\MailSendService;

/**
 * Class MailPasswordResetService
 * @package cms\App\Services\Mails
 */
class MailPasswordResetService extends MailSendService
{

	/**
	 * @param string $email
	 * @param string $view
	 * @param array  $data
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
