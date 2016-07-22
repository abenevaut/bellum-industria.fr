<?php namespace CVEPDB\Contracts\Services\Mails;

interface MailService
{
    /**
     * @param array $emails All emails to send the message
     * @param string $view Blade path view
     * @param string $subject Mail subject
     * @param array $data Blade template data
     * @return mixed
     */
    public function emailTo($emails, $view, $subject, $data = []);
}
