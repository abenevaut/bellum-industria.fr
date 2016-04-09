<?php namespace Core\Http\Outputters;

use App;
use Config;
use Menu;
use Module;

class AdminOutputter extends CoreOutputter
{
    public function __construct()
    {
        parent::__construct();
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
                'menu' => Menu::render('navbar', 'App\Http\Admin\Presenters\SidebarPresenter')
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

//        dd( $modules );

        return [
            'settings' => [
                'menu' => Menu::render('navbar', 'App\Http\Admin\Presenters\SettingsPresenter'),
                'modules' => $modules
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