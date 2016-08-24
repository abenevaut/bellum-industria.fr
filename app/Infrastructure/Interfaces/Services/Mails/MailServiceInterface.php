<?php namespace cms\Infrastructure\Interfaces\Services\Mails;

/**
 * Interface MailServiceInterface
 * @package cms\Infrastructure\Interfaces\Services\Mails
 */
interface MailServiceInterface
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
