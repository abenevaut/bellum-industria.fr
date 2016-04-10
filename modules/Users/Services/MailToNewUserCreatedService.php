<?php namespace Modules\Users\Services;

use Mail;
use Core\Services\MailService;

class MailToNewUserCreatedService extends MailService
{
    public function ez($user)
    {
        $this->emailTo(
            $user->email,
            'users::users.emails.admin.newuser',
            'Admin created your account',
            [
                'user' => $user
            ]
        );
    }
}
