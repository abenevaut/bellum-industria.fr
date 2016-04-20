<?php namespace Modules\Files\Widgets;

use Widget;
use CVEPDB\Contracts\Widgets;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Modules\Users\Repositories\RoleRepositoryEloquent;

class FilesFields implements Widgets
{
    /**
     * @var string Widget title
     */
    protected $title = 'Files field';

    /**
     * @var string Widget description
     */
    protected $description = 'Display files input field';

    /**
     * @var string View namespace ('dashboard::'|null)
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

    /**
     * @var RoleRepositoryEloquent|null
     */
    private $r_role = null;

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

    public function register($name = 'roles[]', $attributes = [])
    {
        return $this->output(
            'files.widgets.filesfields',
            [
                'name' => $name,
                'value' => array_key_exists('value', $attributes) ? $attributes['value'] : '',
                'old_value' => preg_replace("/[^A-Za-z0-9 ]/", '', $name),
                'placeholder' => array_key_exists('placeholder', $attributes) ? trans($attributes['placeholder']) : '',
                'class' => array_key_exists('class', $attributes) ? $attributes['class'] : ''
            ]
        );
    }
}
