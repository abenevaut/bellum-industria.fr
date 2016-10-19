<?php namespace cms\Vitrine\Services;

use cms\App\Services\Mails\MailQueueService;
use cms\Vitrine\Repositories\LogContact;

/**
 * Class MailContactService
 * @package cms\Vitrine\Services
 */
class MailContactService extends MailQueueService
{

	/**
	 * @param string $email
	 * @param string $view
	 * @param array  $data
	 */
	public function send(LogContact $contact)
	{
		$this->emailTo(
			$contact->email,
			'app.vitrine.emails.contact',
			trans('cvepdb/vitrine/emails/emails.contact_title') . $contact->subject,
			[
				'name'         => $contact->last_name . ' ' . $contact->first_name,
				'user_subject' => $contact->subject,
				'user_message' => $contact->subject,
			]
		);
	}

}
