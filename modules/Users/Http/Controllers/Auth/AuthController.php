<?php

namespace Modules\Users\Http\Controllers\Auth;

use App\User;
use Validator;
use Socialite;
use Session;
use Core\Http\Controllers\CorePublicController as Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Theme;
use Modules\Users\Http\Outputters\AuthOutputter;

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
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        return $this->outputter->create($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getLogin()
    {
        $this->outputter->setLoginMeta();
        return $this->outputter->output('users.login');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRegister()
    {
        $this->outputter->setRegisterMeta();
        return $this->outputter->output('users.register');
    }

    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        Session::flash('message', trans('auth.message_success_loggedin'));
        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/';
    }

    /**
     * Redirect the user to a provider authentication page.
     *
     * @return Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from a provider.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->user();

        dd($user);

        // Todo : Si logguer -> ajouter le token au compte courant
        // Todo : Si pas logguer -> on enregistre l'utilisateur
    }
}
