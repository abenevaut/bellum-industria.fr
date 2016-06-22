<?php namespace Core\Domain\Widgets;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use CVEPDB\Contracts\Widgets;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;

/**
 * Class AbstractWidgets
 * @package Core\Domain\Widgets
 */
abstract class AbstractWidgets implements Widgets
{

    /**
     * @var string Widget title
     */
    protected $title = null;

    /**
     * @var string Widget description
     */
    protected $description = null;

    /**
     * @var string View namespace ('dashboard::'|null)
     */
    protected $view_prefix = '';

    /**
     * @var string
     */
    protected $module = '';

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getTitlte()
    {
        return $this->title;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setModuleName($module_name)
    {
        $this->module = $module_name . '::';
    }

    public function getModuleName()
    {
        return $this->module;
    }

    public function output($view, $data = [])
    {
        return cmsview($view, $data, $this->view_prefix, $this->module);
    }

    public function widgetInformation()
    {
        return [
            'title'       => $this->getTitlte(),
            'description' => $this->getDescription(),
        ];
    }

}
