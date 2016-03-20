<?php

namespace App\Outputters;

use App;
use Config;
use Menu;
use Module;
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
    protected $current_module = null;

    public function __construct()
    {
        parent::__construct();

        $this->setBreadcrumbDivider('');
        $this->breadcrumbs->setListElement('li');

        $this->view_prefix = \Theme::getCurrent() . '::';
    }

    public function output($view, $data)
    {
        $current_prefix = $this->view_prefix;


        //\Theme::view($current_prefix . $view);


        try {
            \Theme::view($current_prefix . $view);
        } catch (InvalidArgumentException $e) {
            $current_prefix = $this->current_module;
        }

        //dd( $current_prefix . $view );

        return parent::output($current_prefix . $view, $data);
    }

    protected function set_view_prefix($module)
    {
        $this->current_module = $module;
        $this->view_prefix = Config::get($this->current_module . '.view.use_namespace')
            ? strtolower(Config::get($this->current_module . '.name')) . '::'
            : 'modules.';
    }
}