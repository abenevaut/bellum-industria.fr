<?php namespace Modules\Pages\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Pages\Outputters\PageAdminOutputter;

class PagesAdminController extends Controller
{
    private $outputter = null;

    public function __construct(
        PageAdminOutputter $outputter
    )
    {
        $this->outputter = $outputter;
    }

    public function index()
    {
        return $this->outputter->index();
    }

}