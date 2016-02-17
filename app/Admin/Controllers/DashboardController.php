<?php

namespace App\Admin\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Admin\Outputters\DashboardOutputter;

class DashboardController extends Controller
{
    /**
     * @var DashboardOutputter|null
     */
    private $outputter = null;

    public function __construct(DashboardOutputter $outputter)
    {
        parent::__construct();

        $this->outputter = $outputter;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->outputter->index();
    }
}