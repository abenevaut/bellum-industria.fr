<?php

namespace App\Multigaming\Controllers;

use CVEPDB\Controllers\AbsBaseController as BaseController;
use App\Multigaming\Outputters\IndexOutputter;

/**
 * Class IndexController
 * @package App\Multigaming\Controllers
 */
class IndexController extends BaseController
{
    /**
     * @var IndexOutputter|null
     */
    private $outputter = null;

    public function __construct(IndexOutputter $outputter)
    {
        parent::__construct();
        $this->outputter = $outputter;
    }

    public function index()
    {
        return $this->outputter->index();
    }

    public function boutique()
    {
        return $this->outputter->boutique();
    }

    public function challenge()
    {
        return $this->outputter->challenge();
    }

    public function messageoftheday() {
        return $this->outputter->messageoftheday();
    }

    public function sitemap()
    {
        return $this->outputter->sitemap();
    }
}