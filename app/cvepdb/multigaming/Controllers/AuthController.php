<?php

namespace App\CVEPDB\Multigaming\Controllers;

use App\CVEPDB\Vitrine\Controllers\AbsController as Controller;
use Invisnik\LaravelSteamAuth\SteamAuth;
use App\User;

class AuthController extends Controller
{
    /**
     * @var SteamAuth
     */
    private $steam;

    public function __construct(SteamAuth $steam)
    {
        $this->steam = $steam;
    }

    public function login()
    {
        if ($this->steam->validate()) {
            $info = $this->steam->getUserInfo();
            if (! is_null($info)) {
                $user = User::where('steamid', $info->getSteamID64())->first();
                if (! is_null($user)) {
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }else{
                    $user = User::create([
                        'username' => $info->getNick(),
                        'avatar'   => $info->getProfilePictureFull(),
                        'steamid'  => $info->getSteamID64()
                    ]);
                    Auth::login($user, true);
                    return redirect('/'); // redirect to site
                }
            }
        } else {
            return $this->steam->redirect(); // redirect to Steam login page
        }
    }

}