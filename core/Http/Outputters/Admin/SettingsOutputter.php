<?php namespace Core\Http\Outputters\Admin;

use Config;
use Menu;
use Module;
use Request;
use Response;
use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use CVEPDB\Abstracts\Http\Requests\FormRequest as AbsFormRequest;

/**
 * Class SettingsOutputter
 * @package Core\Http\Outputters
 */
class SettingsOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'global.settings';

    /**
     * @var string Outputter header description
     */
    protected $description = '';

    public function __construct(SettingsRepository $r_settings)
    {
        parent::__construct($r_settings);
        $this->addBreadcrumb(trans('global.settings'), 'admin/settings');
    }

    public function index()
    {
        $modules = [];

        foreach (Module::getOrdered() as $module) {
            $slug = strtolower($module->name);
            $settings = Config::get($slug . '.admin.settings');
            if (!is_null($settings) && !empty($settings)) {
                $modules[$slug] = [
                    'title' => $module->name,
                    'widgets' => $settings['widgets']
                ];
            }
        }

        Menu::create('navbar', function ($menu) {

            $menu->url(
                '#control-sidebar-settings-tab',
                trans('global.general'),
                [],
                [
                    'icon' => 'fa fa-gear'
                ]
            );

            foreach (Module::getOrdered() as $module) {

                $slug = strtolower($module->name);
                $settings = Config::get($slug . '.admin.settings');

                if (!is_null($settings) && !empty($settings)) {
                    $menu->url(
                        '#control-sidebar-'.$slug.'-tab',
                        $module->name,
                        [],
                        [
                            'icon' => $settings['icon']
                        ]
                    );
                }
            }
        });

        return $this->output(
            'core.admin.settings.index',
            [
                'settings' => [
                    'menu' => Menu::render('navbar', 'Core\Http\Presenters\Menus\SettingsPresenter'),
                    'modules' => $modules,
                    'list' => $this->r_settings->all()
                ]
            ]
        );
    }

    public function get(AbsFormRequest $request)
    {
        $data = [];
        if (Request::ajax()) {
            $setting_key = $request->get('setting_key');
            $data[$setting_key] = $this->r_settings->get($setting_key);
        }
        return Response::json($data);
    }

    public function set(AbsFormRequest $request)
    {
        $data = [];
        if (Request::ajax()) {
            $setting_key = $request->get('setting_key');
            $setting_value = $request->get('setting_value');
            $this->r_settings->set($setting_key, $setting_value);
            $data[$setting_key] = $setting_value;
        }
        return Response::json($data);
    }
}