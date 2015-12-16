<?php

namespace App\CVEPDB\Clients\Controllers;

use Mail;
use App\User;
use App\CVEPDB\Api\Transformers\UserTransformer;

use Illuminate\Routing\Controller as BaseController;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class UsersController extends BaseController
{
    use EntrustUserTrait;

    public function index()
    {

        Mail::send('cvepdb.api.emails.test', ['user' => 'test test'], function ($m) {
            $m->from('contact@cavaencoreparlerdebits.fr', 'Your Application');
            $m->to('antoine@cvepdb.fr', 'test test')->subject('Your Reminder!');
        });
        
        return 'test';
    }
}