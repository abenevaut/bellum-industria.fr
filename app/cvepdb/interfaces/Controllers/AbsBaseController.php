<?php

namespace App\CVEPDB\Interfaces\Controllers;

use Illuminate\Routing\Controller as BaseController;

use \Creitive\Breadcrumbs\Breadcrumbs as Breadcrumbs;

class AbsBaseController extends BaseController
{
    protected $breadcrumbs;

    public function __construct() {
        $this->breadcrumbs = new Breadcrumbs;
        $this->breadcrumbs->setDivider('<i class="icon-right-dir"></i>');
        // $this->breadcrumbs->setListElement('');
        $this->breadcrumbs->addCrumb('Home', '/');
    }
}