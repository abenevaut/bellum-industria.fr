<?php

namespace App\Http\Controllers\Auth;

//use App\Http\Controllers\Controller;
use App\CVEPDB\Interfaces\Controllers\AbsController as Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Auth\Passwords\PasswordBroker;

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
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->subject = trans('auth.mail_reset_password_title');
        $this->middleware('guest');
    }
}
