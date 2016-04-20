<?php namespace Core\Http\Outputters;

use App;
use Config;
use Menu;
use Module;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class AdminOutputter
 * @package Core\Http\Outputters
 */
class AdminOutputter extends CoreOutputter
{
    public function __construct(SettingsRepository $r_settings)
    {
        parent::__construct($r_settings);
        $this->addBreadcrumb('Dashboard', config('app.backend'));
    }

    public function output($view, $data = [])
    {
        return parent::output(
            $view,
            $data
                + $this->admin_data_sidebar()
                + $this->admin_data_settings()
                + $this->admin_data_footer()
        );
    }

    private function admin_data_sidebar()
    {
        Menu::create('navbar', function ($menu) {
            $menu->header('Main navigation');

            foreach (Module::getOrdered() as $module) {

                $route = Config::get(strtolower($module->name) . '.admin.sidebar.route');

                if (!is_null($route)) {
                    $menu->route(
                        $route,
                        Config::get(strtolower($module->name) . '.name'),
                        [],
                        [
                            'icon' => Config::get(strtolower($module->name) . '.admin.sidebar.icon')
                        ]
                    );
                }
            }


        });

        return [
            'sidebar' => [
                'menu' => Menu::render('navbar', 'Core\Http\Presenters\SidebarPresenter')
            ]
        ];
    }

    private function admin_data_settings()
    {
        $modules = [];

        foreach (Module::getOrdered() as $module) {
            $slug = strtolower($module->name);
            $settings = Config::get($slug . '.admin.settings');
            if (!is_null($settings)) {
                $modules[$slug] = [
                    'title' => $module->name,
                    'widgets' => $settings['widgets']
                ];
            }
        }

        Menu::create('navbar', function ($menu) {

            $menu->url(
                '#control-sidebar-settings-tab',
                'Settings',
                [],
                [
                    'icon' => 'fa fa-gears'
                ]
            );

            foreach (Module::getOrdered() as $module) {

                $slug = strtolower($module->name);
                $settings = Config::get($slug . '.admin.settings');

                if (!is_null($settings)) {

                    $menu->url(
                        '#control-sidebar-'.$slug.'-tab',
                        $module->name,
                        [],
                        [
                            'icon' => $settings['icon']
                        ]
                    );
                }

                $m[$slug] = [
                    'title' => $module->name,
                    'widgets' => $settings['widgets']
                ];
            }
        });

        return [
            'settings' => [
                'menu' => Menu::render('navbar', 'Core\Http\Presenters\SettingsPresenter'),
                'modules' => $modules,
                'list' => $this->r_settings->all()
            ]
        ];
    }

    private function admin_data_footer()
    {
        return [
            'footer' => [
                'version' => Config::get('app.version'),
                'title' => Config::get('app.title'),
                'url' => Config::get('app.url'),
            ]
        ];
    }
}