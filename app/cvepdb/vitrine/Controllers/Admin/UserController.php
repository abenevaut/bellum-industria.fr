<?php

namespace App\CVEPDB\Vitrine\Controllers\Admin;

use App\CVEPDB\Vitrine\Controllers\Abs\AbsController as Controller;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(15);


//        try {
//            $geocode = \Geocoder::geocode('10 rue Gambetta, Paris, France');
//            // The GoogleMapsProvider will return a result
//            var_dump($geocode); exit;
//        } catch (\Exception $e) {
//            // No exception will be thrown here
//            echo $e->getMessage(); exit;
//        }

        return view('cvepdb.vitrine.admin.user', ['users' => $users]);
    }
}