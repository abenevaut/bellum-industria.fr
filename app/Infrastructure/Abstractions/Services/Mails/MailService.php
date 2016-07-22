<?php namespace CVEPDB\Abstracts\Services\Mails;

use Mail;
use CVEPDB\Contracts\Services\Mails\MailService as IMailService;

abstract class MailService implements IMailService
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
