<?php namespace Modules\Users\Brokers;

use Closure;
use Illuminate\Auth\Passwords\PasswordBroker as IlluminatePasswordBroker;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Auth\Passwords\TokenRepositoryInterface;
use Modules\Users\Services\MailToNewUserCreatedService;

/**
 * Class PasswordBroker
 * @package Modules\Users\Brokers
 */
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
     * @var MailToNewUserCreatedService|null
     */
    protected $s_mailer = null;

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
        $emailView,
        MailToNewUserCreatedService $s_mailer
    )
    {
        parent::__construct($tokens, $users, $mailer, $emailView);
        $this->s_mailer = $s_mailer;
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
        return $this->s_mailer->send(
            $user->getEmailForPasswordReset(),
            $this->emailView,
            compact('token', 'user')
        );
    }

    /**
     * Reset the password for the given token.
     *
     * @param  array $credentials
     * @param  Closure $callback
     * @return mixed
     */
    public function reset(array $credentials, Closure $callback)
    {
        return parent::reset($credentials, $callback);
    }
}
