<?php

namespace App\CVEPDB\Admin\Controllers\Abs;

use App\CVEPDB\Interfaces\Controllers\AbsController as Controller;

abstract class AbsController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
}