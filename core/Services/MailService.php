<?php

namespace App\Services;

use Mail;
use CVEPDB\Services\Mails\IMailService;

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
                ->from(env('APP_CONTACT_MAIL'), env('APP_CONTACT_DISPLAY_NAME'))
                ->subject($subject);
        });
    }
}
