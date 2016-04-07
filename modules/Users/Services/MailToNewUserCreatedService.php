<?php namespace Modules\Users\Services;

use Mail;
use App\Services\MailService;

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
