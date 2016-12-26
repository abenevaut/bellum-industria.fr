<?php namespace cms\Multigaming\Services;

use cms\App\Services\MailsService;
use cms\Multigaming\Repositories\LogContact;

/**
 * Class MailContactService
 * @package cms\Multigaming\Services
 */
class MailContactService extends MailsService
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
			'app.multigaming.emails.contact',
			trans('cvepdb/multigaming/emails/emails.contact_title') . $contact->subject,
			[
				'name'         => $contact->last_name . ' ' . $contact->first_name,
				'user_subject' => $contact->subject,
				'user_message' => $contact->subject,
			]
		);
	}

}
