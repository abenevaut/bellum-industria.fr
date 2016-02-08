<?php

namespace App\Multigaming\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Multigaming\Repositories\UserRepository as UserRepository;
use Invisnik\LaravelSteamAuth\SteamAuth;
use CVEPDB\Repositories\Users\User;

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

    public function __construct(SteamAuth $steam, UserRepository $r_user)
    {
        parent::__construct();

        $this->steam = $steam;
        $this->users = $r_user;
    }

    public function login()
    {
        if ($this->steam->validate()) {

            $info = $this->steam->getUserInfo();

            if (!is_null($info)) {

                $user = $this->users->findByField('steam_token', $info->getSteamID64())->first();

                if (is_null($user)) {
                    $user = $this->users->create_gamer([
                        'first_name' => $info->getNick(),
                        'last_name' => '',
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