<?php

namespace App\CVEPDB\Multigaming\Controllers;

use App\CVEPDB\Multigaming\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Multigaming\Repositories\UserRepository as UserRepository;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;

class AuthController extends Controller
{
    /**
     * @var SteamAuth
     */
    private $steam;

    /**
     * @var UserRepository|null
     */
    private $users = null;

    public function __construct(SteamAuth $steam)
    {
        parent::__construct();

        $this->steam = $steam;
        $this->users = new UserRepository;
    }

    public function login()
    {
        if ($this->steam->validate()) {

            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {

                $user = $this->users->findUniqueBy('steam_token', $info->getSteamID64());

                if (is_null($user)) {
                    $user = $this->users->create([
                        'first_name' => $info->getNick(),
                        'last_name' => '',
                        'email' => NULL,
                        'password' => '',
                        'steam_token' => $info->getSteamID64()
                    ]);
                }

                \Auth::login($user, true);

                return redirect('/');
            }
        }
        return $this->steam->redirect('/');
    }

    public function logout()
    {
        \Auth::logout();
        return redirect('/');
    }
}