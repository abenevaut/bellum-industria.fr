<?php

namespace App\Http\Front\Outputters;

use App\Http\Outputters\CoreOutputter;

class FrontOutputter extends CoreOutputter
{
    public function __construct()
    {
        parent::__construct();
        $this->addBreadcrumb('Home', '/');
    }

    public function output($view, $data = [])
    {

        // Todo :: Connect to Theme module and get menu

        return parent::output($this->view_prefix . $view, $data);
    }
}