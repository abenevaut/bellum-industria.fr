<?php namespace cms\Infrastructure\Abstractions\Services\Mails;

use CVEPDB\Settings\Facades\Settings;
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
     * @return mixed
     */
    public function emailTo($emails, $view, $subject, $data = [])
    {
        Mail::send($view, $data, function($message) use ($emails, $subject) {
            $message->to($emails)
                ->from(Settings::get('mail.from.address'))
                ->subject($subject);

			if ($mailwatch = Settings::get('cms.mail.mailwatch'))
			{
				$message->bcc($mailwatch);
			}
        });
    }

}
