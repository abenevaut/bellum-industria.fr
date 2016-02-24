<?php

namespace App\Api\Controllers;

use Kirby;
use CVEPDB\Controllers\AbsBaseController as BaseController;

class DocController extends BaseController
{
    public function index()
    {
        define('DS', '/');

        require(base_path('kirby/bootstrap.php'));

        dd(Kirby::start());

        return Kirby::start();
    }
}
