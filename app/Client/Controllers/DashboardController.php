<?php

namespace App\Client\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Client\Outputters\DashboardOutputter;

class DashboardController extends Controller
{
    private $outputter = null;

    public function __construct(DashboardOutputter $outputter)
    {
        parent::__construct();

        $this->outputter = $outputter;
    }

    public function index()
        return $this->outputter->index();
    }
}
