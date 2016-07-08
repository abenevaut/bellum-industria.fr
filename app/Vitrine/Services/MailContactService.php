<?php namespace App\Vitrine\Services;

use Core\Services\MailSendService;

/**
 * Class MailPasswordResetService
 * @package Core\Domain\Users\Services
 */
class MailContactService extends MailSendService
{

	/**
	 * @param string $email
	 * @param string $view
	 * @param array  $data
	 */
	public function send($email, $view, $data)
	{
//		$this->emailTo(
//			$email,
//			$view,
//			trans('passwords.mail_reset_password_title'),
//			$data
//		);
	}
}
