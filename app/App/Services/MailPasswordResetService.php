<?php namespace cms\Domain\Services;

use cms\Domain\Services\MailSendService;

/**
 * Class MailPasswordResetService
 * @package cms\Domain\Services
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
