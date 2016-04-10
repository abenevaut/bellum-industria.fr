<?php

namespace Modules\Users\Http\Controllers\Auth;

use App\User;
use Validator;
use Core\Http\Controllers\CorePublicController as Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Theme;
use Modules\Users\Http\Outputters\Admin\AuthOutputter;

class AdminAuthController extends Controller
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
    protected $redirectTo = 'admin';

    /**
     * @var AuthAdminOutputter|null
     */
    private $outputter = null;

    /**
     * Create a new authentication controller instance.
     *
     * @param AuthOutputter $outputter
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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        return $this->outputter->output('users.admin.login');
    }
}
