<?php namespace Modules\Users\Widgets;

use Widget;
use CVEPDB\Contracts\Widgets;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Modules\Users\Repositories\RoleRepositoryEloquent;

class RolesFields implements Widgets
{
    /**
     * @var string Widget title
     */
    protected $title = 'Roles field';

    /**
     * @var string Widget description
     */
    protected $description = 'Display roles input field';

    /**
     * @var string View namespace ('dashboard::'|null)
     */
    protected $view_prefix = 'users::';

    /**
     * @var string
     */
    protected $module = 'users::';

    /**
     * @var SettingsRepository|null
     */
    private $r_settings = null;

    /**
     * @var RoleRepositoryEloquent|null
     */
    private $r_role = null;

    public function __construct(SettingsRepository $r_settings, RoleRepositoryEloquent $r_role)
    {
        $this->r_settings = $r_settings;
        $this->r_role = $r_role;
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
        $roles = $this->r_role->lists('display_name', 'id');

        foreach ($roles as $id => $role) {
            $roles[$id] = trans($role);
        }

        return $this->output(
            'users.widgets.rolesfields',
            [
                'roles' => $roles,
                'name' => $name,
                'value' => array_key_exists('value', $attributes) ? $attributes['value'] : '',
                'old_value' => preg_replace("/[^A-Za-z0-9 ]/", '', $name),
                'placeholder' => array_key_exists('placeholder', $attributes) ? trans($attributes['placeholder']) : '',
                'class' => array_key_exists('class', $attributes) ? $attributes['class'] : ''
            ]
        );
    }
}
