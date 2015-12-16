<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Routing\Controller as BaseController;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class IndexController extends BaseController
{
    use EntrustUserTrait;

    public function index()
    {
        return 'test';
    }
}