<?php

namespace Modules\Users\Http\Controllers\Auth;

use App\User;
use Validator;
use CVEPDB\Controllers\AbsController as Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Theme;
use Modules\Users\Outputters\AuthOutputter;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * @var AuthOutputter|null
     */
    private $outputter = null;

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct(AuthOutputter $outputter)
    {
        parent::__construct();
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
        $this->outputter = $outputter;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'last_name' => 'required|max:50',
            'first_name' => 'required|max:50',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->outputter->create($data);
    }

    public function getLogin()
    {
        return $this->outputter->output('users.login');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        return $this->outputter->output('users.register');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }
}
