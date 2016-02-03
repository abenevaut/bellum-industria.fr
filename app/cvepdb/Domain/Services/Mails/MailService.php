<?php

namespace App\CVEPDB\Domain\Services\Mails;

use Mail;

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
                ->from('contact@cavaencoreparlerdebits.fr')
                ->bcc('mailwatch@cavaencoreparlerdebits.fr')
                ->subject($subject);
        });
    }
}