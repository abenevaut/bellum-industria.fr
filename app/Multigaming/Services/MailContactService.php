<?php namespace cms\Multigaming\Services;

use cms\App\Services\MailsService;

class MailContactService extends MailsService
{

	/**
	 * @param string $email
	 * @param string $view
	 * @param array  $data
	 */
	public function send(
		$first_name,
		$last_name,
		$email,
		$subject,
		$message
	)
	{
		$this->emailTo(
			[$email],
			'app.multigaming.emails.contact',
			trans('cvepdb/multigaming/emails/emails.contact_title') . $subject,
			[
				'name'         => $last_name . ' ' . $first_name,
				'user_subject' => $subject,
				'user_message' => $message,
			]
		);
	}
}
