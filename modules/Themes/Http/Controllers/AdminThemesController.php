<?php namespace Modules\Themes\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Themes\Outputters\ThemeAdminOutputter;

class AdminThemesController extends Controller
{
	private $outputter = null;

    public function __construct(ThemeAdminOutputter $outputter)
    {
        $this->outputter = $outputter;
    }

    public function index()
    {
        return $this->outputter->index();
    }

    public function edit($theme)
    {
        return $this->outputter->edit($theme);
    }

}