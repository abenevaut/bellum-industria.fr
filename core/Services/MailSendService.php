<?php namespace Core\Services;

use Mail;
use CVEPDB\Abstracts\Services\Mails\MailService as AbsMailService;
use CVEPDB\Settings\Facades\Settings;

/**
 * Class MailSendService
 *
 * Send emails without delay.
 *
 * @package Core\Services
 */
abstract class MailSendService extends AbsMailService
{

	/**
	 * Send one mail to multiple emails.
	 *
	 * @param array  $emails All emails to send the message
	 * @param string $view Blade path view
	 * @param string $subject Mail subject
	 * @param array  $data Blade template data
	 *
	 * @return mixed
	 */
	public function emailTo($emails, $view, $subject, $data = [])
	{
		Mail::send($view, $data, function ($message) use ($emails, $subject) {
		

			$mailfrom = Settings::get('mail.from.address');
			$mailname = Settings::get('mail.from.name');
			$mailwatch = Settings::get('core.mail.mailwatch');

			$message->to($emails)
				->from($mailfrom, $mailname)
				->subject($subject);

			if (!is_null($mailwatch) && !empty($mailwatch))
			{
				$message->bcc($mailwatch);
			}
		});
	}
}
