<?php namespace Modules\Users\Providers;

use Illuminate\Auth\Passwords\PasswordBroker as IlluminatePasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Auth\CanResetPassword;

class PasswordBroker extends IlluminatePasswordBroker
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new password broker instance.
     *
     * @param  \Illuminate\Auth\Passwords\TokenRepositoryInterface $tokens
     * @param  \Illuminate\Contracts\Auth\UserProvider $users
     * @param  \Illuminate\Contracts\Mail\Mailer $mailer
     * @param  string $emailView
     * @return void
     */
    public function __construct(
        TokenRepositoryInterface $tokens,
        UserProvider $users,
        MailerContract $mailer,
        $emailView
    )
    {
        parent::__construct($tokens, $users, $mailer, $emailView);
    }

    public function emailResetLink(CanResetPassword $user, $token, \Closure $callback = null)
    {
        $this->emailView = \Theme::getCurrent() . '::users.emails.password';
        $view = $this->emailView;

        dd($view);

        return $this->mailer->queue($view, compact('token', 'user'), function ($m) use ($user, $token, $callback) {

            $m->to($user->getEmailForPasswordReset())
                ->from(config('cvepdb.emails.from.contact'))
                ->bcc(config('cvepdb.emails.copy.mailwatch'));

            if (!is_null($callback)) {
                call_user_func($callback, $m, $user, $token);
            }

        });
    }

}
