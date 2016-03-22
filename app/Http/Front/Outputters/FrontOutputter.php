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
        return parent::output($view, $data);
    }
}
