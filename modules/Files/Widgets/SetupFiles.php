<?php namespace Modules\Dashboard\Widgets;

use Widget;
use CVEPDB\Contracts\Widgets;
use Modules\Files\Repositories\SettingsRepository;

/**
 * Class SetupFiles
 * @package Modules\Dashboard\Widgets
 */
class SetupFiles implements Widgets
{
    /**
     * @var string Widget title
     */
    protected $title = 'Setup files';

    /**
     * @var string Widget description
     */
    protected $description = 'Choose files managers';

    /**
     * @var string View namespace ('files::'|null)
     */
    protected $view_prefix = 'files::';

    /**
     * @var string
     */
    protected $module = 'files::';

    /**
     * @var SettingsRepository|null
     */
    private $r_settings = null;

    public function __construct(SettingsRepository $r_settings)
    {
        $this->r_settings = $r_settings;
    }

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
            'title' => $this->getTitlte(),
            'description' => $this->getDescription(),
        ];
    }

    public function register($action = null)
    {
        switch ($action) {
            case 'info': {
                return $this->widgetInformation();
            }
            default: {


                return $this->output(
                    'files.widgets.setupfilesmanager',
                    [
                        'widgets' => [
                        ]
                    ]
                );
            }
        }
    }
}
