<?php

namespace App\CVEPDB\Clients\Controllers;

use App\User;
use App\CVEPDB\Api\Transformers\UserTransformer;

use Illuminate\Routing\Controller as BaseController;

use App\cvepdb\clients\Events\Users as UserEvent;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class UsersController extends BaseController
{
    use EntrustUserTrait;

    public function index()
    {

        \Event::fire(new UserEvent());
        
        return 'test';
    }
}