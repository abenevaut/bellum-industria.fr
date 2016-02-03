<?php

namespace App\CVEPDB\Domain\Services\Mails;

use App\CVEPDB\Domain\Services\Mails\MailService;
use App\CVEPDB\Admin\Models\LogContact as LogContact;

class ContactMailService extends MailService
{
    /**
     * Vitrine contact form - App\CVEPDB\Vitrine\Controllers\ContactController
     *
     * @param LogContact $contact
     */
    public function contact_form(LogContact $contact)
    {
        $subject = trans('cvepdb/vitrine/emails/emails.contact_title') . $contact->subject;
        $data = [
            'name' => $contact->last_name . ' ' . $contact->first_name,
            'email' => $contact->email,
            'user_subject' => $contact->subject,
            'user_message' => $contact->message
        ];

        $view = 'cvepdb.admin.emails.contact';
        $this->emailTo($contact->email, $view, $subject, $data);

        $view = 'cvepdb.vitrine.emails.contact';
        $this->emailTo($contact->email, $view, $subject, $data);
    }
}