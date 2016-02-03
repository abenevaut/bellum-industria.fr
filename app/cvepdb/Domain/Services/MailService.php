<?php

namespace App\CVEPDB\Admin\Services;

abstract class MailService
{
    public function emailTo($person, $view, $data, $subject)
    {
        \Mail::send($view, $data, function($message) use($person, $subject)
        {
            $message->to($person->email)
                ->subject($subject);
        });
    }
}