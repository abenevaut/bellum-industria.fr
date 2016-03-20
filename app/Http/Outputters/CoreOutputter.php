<?php

namespace App\Http\Outputters;

use App;
use Config;
use Menu;
use Module;
use Theme;
use CVEPDB\Services\Outputters\AbsLaravelOutputter;

class CoreOutputter extends AbsLaravelOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'default';

    /**
     * @var string Outputter header description
     */
    protected $description = 'default';

    /**
     * @var string View namespace ('users::'|null)
     */
    protected $view_prefix = null;

    /**
     * @var null
     */
    private $current_module = null;

    public function __construct()
    {
        parent::__construct();

        $this->setBreadcrumbDivider('');
        $this->breadcrumbs->setListElement('li');
        $this->set_view_prefix();
    }

    public function output($view, $data)
    {
        return find_view($view, $this->view_prefix, $this->current_module, $data);
    }

    private function set_view_prefix()
    {
        $this->view_prefix = Theme::getCurrent() . '::';
    }

    protected function set_current_module($module)
    {
        $this->current_module = $module . '::';
    }
}