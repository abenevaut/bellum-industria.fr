<?php

namespace App\Client\Controllers;

use CVEPDB\Controllers\AbsController as Controller;
use App\Client\Outputters\EntiteOutputter;

class EntiteController extends Controller
{
    private $outputter = null;

    public function __construct(EntiteOutputter $outputter)
    {
        parent::__construct();

        $this->outputter = $outputter;
    }

    public function index()
    {
        return $this->outputter->index();
    }

    public function join()
    {
        return $this->outputter->join();
    }
}