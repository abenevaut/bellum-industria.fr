<?php

namespace Modules\Users\Http\Controllers\Auth;

use CVEPDB\Controllers\AbsController as Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Theme;

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
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->view_prefix = \Theme::getCurrent() . '::';
    }

    /**
     * Display the form to request a password reset link.
     *
     * @return Response
     */
    public function getEmail()
    {
        return view('auth.password');
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function getReset($token = null)
    {
        if (is_null($token))
        {
            throw new NotFoundHttpException;
        }

        $view = 'users.reset';
        return find_view($view, $this->view_prefix, $this->current_module, ['token' => $token]);
    }

    /**
     * Display the password reset view for the given token.
     *
     * @param  string  $token
     * @return Response
     */
    public function linkRequestView()
    {
        $view = 'users.password';
        return find_view($view, $this->view_prefix, $this->current_module);
    }
}
