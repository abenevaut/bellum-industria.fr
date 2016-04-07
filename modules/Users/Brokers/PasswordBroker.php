<?php namespace Modules\Users\Brokers;

use Closure;
use Illuminate\Auth\Passwords\PasswordBroker as IlluminatePasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;

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
     * @param TokenRepositoryInterface $tokens
     * @param UserProvider $users
     * @param MailerContract $mailer
     * @param string $emailView
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

    /**
     * @param CanResetPasswordContract $user
     * @param string $token
     * @param Closure|null $callback
     * @return mixed
     */
    public function emailResetLink(CanResetPasswordContract $user, $token, Closure $callback = null)
    {
        $this->emailView = cmsview_prefix('users.emails.password', $view_prefix = null, 'users') . '::users.emails.password';
        $view = $this->emailView;

        return $this->mailer->queue($view, compact('token', 'user'), function ($m) use ($user, $token, $callback) {

            $m->to($user->getEmailForPasswordReset())
                ->from(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'))
                ->bcc(env('MAIL_FROM_EMAIL'), env('MAIL_FROM_NAME'));

            if (!is_null($callback)) {
                call_user_func($callback, $m, $user, $token);
            }

        });
    }

    /**
     * Reset the password for the given token.
     *
     * @param  array $credentials
     * @param  \Closure $callback
     * @return mixed
     */
    public function reset(array $credentials, Closure $callback)
    {
        return parent::reset($credentials, $callback);
    }
}
