<?php namespace Core\Http\Outputters;

use App;
use Config;
use Menu;
use Module;
use Theme;
use CVEPDB\Abstracts\Services\Outputters\AbsLaravelOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;

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
    private $view_prefix = null;

    /**
     * @var null
     */
    private $current_module = null;

    /**
     * @var Settings|null
     */
    protected $r_settings = null;

    public function __construct(SettingsRepository $r_settings)
    {
        parent::__construct();

        $this->r_settings = $r_settings;

        $this->setBreadcrumbDivider('');
        $this->breadcrumbs->setListElement('li');
        $this->set_view_prefix();
    }

    /**
     * @param string $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function output($view, $data = [])
    {
        return cmsview(
            $view,
            $data
                + $this->data_header(),
            $this->view_prefix,
            $this->current_module
        );
    }

    /**
     *
     */
    private function set_view_prefix()
    {
        $this->view_prefix = Theme::getCurrent() . '::';
    }

    /**
     * @return string
     */
    protected function get_view_prefix()
    {
        return $this->view_prefix;
    }

    /**
     * @param $module
     */
    protected function set_current_module($module)
    {
        $this->current_module = $module . '::';
    }

    /**
     * @return null
     */
    protected function get_current_module()
    {
        return $this->current_module;
    }

    /**
     * @return array
     */
    private function data_header()
    {
        return [
            'header' => [
                'title' => $this->title,
                'description' => $this->description,
            ],
            'breadcrumbs' => $this->breadcrumbs
        ];
    }
}