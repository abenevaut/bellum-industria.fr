<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
//use App\Http\Controllers\Controller;
use App\CVEPDB\Interfaces\Controllers\AbsController as Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

use Socialite;

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
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
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
            'first_name' => 'required|min:3|max:50',
            'last_name' => 'required|min:3|max:50',
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
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
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

    /**
     * Once autheticated on site
     *
     * @param \Illuminate\Http\Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticated(\Illuminate\Http\Request $request, \App\User $user)
    {
        $route = 'home';
        if (\Auth::check() && \Auth::user()->hasRole('admin')) {
            $route = 'admin/dashboard';
        } else if (\Auth::check() && \Auth::user()->hasRole('client')) {
            $route = 'clients/dashboard';
        }

        $request->session()->flash('message', trans('auth.message_success_loggedin'));

        return redirect()->intended($route);
    }

    public function logout()
    {
        \Session::flash('message', trans('auth.message_success_loggedout'));
    }
}
