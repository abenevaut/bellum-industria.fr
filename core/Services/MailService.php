<?php

namespace Core\Services;

use Mail;
use CVEPDB\Abstracts\Services\Mails\MailService as AbsMailService;

abstract class MailService extends AbsMailService
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
                ->from(Settings::get('mail.from.address'), Settings::get('mail.from.name'))

                // ->bcc(Settings::get('core.mail.mailwatch'))

                ->subject($subject);
        });
    }
}
