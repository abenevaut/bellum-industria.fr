<?php namespace cms\Infrastructure\Abstractions\Services\Mails;

use Illuminate\Support\Facades\Mail;
use cms\Infrastructure\Interfaces\Services\Mails\MailServiceInterface;

/**
 * Class MailServiceAbstract
 * @package cms\Infrastructure\Abstractions\Services\Mails
 */
abstract class MailServiceAbstract implements MailServiceInterface
{

    /**
     * @param array $emails All emails to send the message
     * @param string $view Blade path view
     * @param string $subject Mail subject
     * @param array $data Blade template data
     */
    public function sendTo(array $emails, $view, $subject, $data = [])
    {
        Mail::send($view, $data, function($message) use ($emails, $subject) {
            $message->to($emails)
                ->from(config('mail.from.address'))
                ->bcc(config('cms.mail.mailwatch'))
                ->subject($subject);
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
		Mail::queue($view, $data, function($message) use ($emails, $subject) {
			$message->to($emails)
				->from(config('mail.from.address'))
				->bcc(config('cms.mail.mailwatch'))
				->subject($subject);
		});
	}
}
