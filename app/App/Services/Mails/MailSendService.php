<?php namespace cms\App\Services\Mails;

use Illuminate\Support\Facades\Mail;
use CVEPDB\Settings\Facades\Settings;
use cms\Infrastructure\Abstractions\Services\Mails\MailServiceAbstract;

/**
 * Class MailSendService
 * @package cms\App\Services\Mails
 */
abstract class MailSendService extends MailServiceAbstract
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
		Mail::send($view, $data, function ($message) use ($emails, $subject)
		{
			$mailfrom = Settings::get('mail.from.address');
			$mailname = Settings::get('mail.from.name');
			$mailwatch = Settings::get('cms.mail.mailwatch');

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
