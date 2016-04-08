<?php

namespace Modules\Users\Http\Controllers\Auth;

use CVEPDB\Controllers\AbsController as Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Theme;
use Modules\Users\Outputters\PasswordOutputter;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Password;

class PasswordController extends Controller
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
     * @var string View namespace ('users::'|<theme prefix>|null)
     */
    protected $view_prefix = null;

    /**
     * @var null
     */
    protected $current_module = 'users::';

    /**
     * @var PasswordOutputter|null
     */
    private $outputter = null;

    /**
     * Create a new password controller instance.
     *
     * @param PasswordOutputter $outputter
     */
    public function __construct(PasswordOutputter $outputter)
    {
        $this->middleware('guest');
        $this->outputter = $outputter;
        $this->subject = trans('passwords.mail_reset_password_title');
        $this->view_prefix = \Theme::getCurrent() . '::';
        $this->redirectTo = '/';
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return Response
     */
    public function getEmail()
    {
        return $this->outputter->output('users.passwords.email');
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function getReset($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }
        return $this->outputter->output('users.passwords.reset', ['token' => $token]);
    }
}
