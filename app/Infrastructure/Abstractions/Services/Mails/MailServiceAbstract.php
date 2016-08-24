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
     * @return mixed
     */
    public function emailTo($emails, $view, $subject, $data = [])
    {
        Mail::send($view, $data, function($message) use ($emails, $subject) {
            $message->to($emails)
                ->from(config('cvepdb.emails.from.contact'))
                ->bcc(config('cvepdb.emails.copy.mailwatch'))
                ->subject($subject);
        });
    }

}
