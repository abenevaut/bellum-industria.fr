<?php

namespace App\CVEPDB\Multigaming\Controllers;

use App\CVEPDB\Multigaming\Controllers\Abs\AbsBaseController as BaseController;
use App\CVEPDB\Multigaming\Domains\IndexDomain as IndexDomain;

class IndexController extends BaseController
{
    /**
     * @var IndexDomain|null Domain object
     */
    private $domain = null;

    public function __construct()
    {
        parent::__construct();

        $this->domain = new IndexDomain;
    }

    public function getIndex()
    {
        return $this->domain->indexIndex();
    }

    public function getBoutique()
    {
        return $this->domain->indexBoutique();
    }

    public function getSitemap()
    {
        return $this->domain->indexSitemap();
    }
}