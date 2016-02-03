<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Http\Request as Request;
use CVEPDB\Controllers\AbsBaseController as BaseController;

use App\CVEPDB\Vitrine\Outputters\SimplePageOutputter as SimplePageOutputter;

class IndexController extends BaseController
{
    private $outputter = null;

    public function __construct()
    {
        $this->outputter = new SimplePageOutputter();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('cvepdb.vitrine.index');
    }

    /**
     * Index sitemap
     */
    public function sitemap()
    {
        $this->outputter->generateIndexSitemap([
            'home',
            'services',
            'about',
            'boutique',
        ]);
    }
}