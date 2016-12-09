<?php namespace cms\App\Services;

use Illuminate\Support\Facades\Mail;
use cms\Infrastructure\Abstractions\Services\Mails\MailServiceAbstract;

/**
 * Class MailsService
 * @package cms\App\Services
 */
abstract class MailsService extends MailServiceAbstract
{

	/**
	 * Send one mail to multiple emails.
	 *
	 * @param array  $emails All emails to send the message
	 * @param string $view Blade path view
	 * @param string $subject Mail subject
	 * @param array  $data Blade template data
	 */
	public function emailTo($emails, $view, $subject, $data = [])
	{
		Mail::send($view, $data, function ($message) use ($emails, $subject)
		{
			$mailfrom = \Settings::get('mail.from.address');
			$mailname = \Settings::get('mail.from.name');
			$mailwatch = \Settings::get('cms.mail.mailwatch');

			$message->to($emails)
				->from($mailfrom, $mailname)
				->subject($subject);

			if (!is_null($mailwatch) && !empty($mailwatch))
			{
				$message->bcc($mailwatch);
			}
		});
	}

	/**
	 * @param array $emails All emails to send the message
	 * @param string $view Blade path view
	 * @param string $subject Mail subject
	 * @param array $data Blade template data
	 */
	public function queueAndSendTo(array $emails, $view, $subject, $data = [])
	{
		Mail::queue($view, $data, function ($message) use ($emails, $subject)
		{
			$mailfrom = \Settings::get('mail.from.address');
			$mailname = \Settings::get('mail.from.name');
			$mailwatch = \Settings::get('cms.mail.mailwatch');

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
