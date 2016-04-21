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

    /**
     * @param string $view
     * @param array $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function output($view, $data = [])
    {
        return parent::output(
            $view,
            $data
                + $this->header_navigation()
                + $this->main_navigation()
                + $this->footer()
        );
    }

    private function header_navigation()
    {
        $modules_list = Module::getOrdered();

        Menu::create(
            'navbar',
            function ($menu) use ($modules_list) {

                $menu->url(
                    '/',
                    trans('menus.view_website'),
                    [],
                    [
                        'icon' => 'fa fa-globe',
                        'target' => '_blank'
                    ]
                );

                $menu->dropdown(
                    trans('global.shortcuts'),
                    function ($submenu) use ($modules_list) {

                        $i = 0;

                        foreach ($modules_list as $module) {

                            $config_base_tag = strtolower($module->name) . '.admin.sidebar.shortcuts.';
                            $route = Config::get($config_base_tag . 'route');

                            if (!is_null($route)) {

                                if ($i) {
                                    $submenu->divider();
                                }

                                $submenu->route(
                                    $route,
                                    $module->name,
                                    [],
                                    [
                                        'icon' => Config::get($config_base_tag . 'icon')
                                    ]
                                );

                                $i++;
                            }
                        }
                    },
                    [],
                    [
                        'icon' => 'fa fa-fast-forward'
                    ]
                );
            }
        );
        return [
            'menu' => Menu::render('navbar', config('core.backend.menus.header.presenters'))
        ];
    }

    /**
     * @return array
     */
    private function main_navigation()
    {
        $modules_list = Module::getOrdered();

        Menu::create(
            'navbar',
            function ($menu) use ($modules_list) {

                $menu->header(trans('menus.main_navigation'));

                foreach ($modules_list as $module) {

                    $config_base_tag = strtolower($module->name) . '.admin.sidebar.menu.';
                    $route = Config::get($config_base_tag . 'route');

                    if (!is_null($route)) {
                        $menu->route(
                            $route,
                            $module->name,
                            [],
                            [
                                'icon' => Config::get($config_base_tag . 'icon')
                            ]
                        );
                    }
                }

                $menu->dropdown(
                    trans('global.settings'),
                    function ($submenu) use ($modules_list) {

                        $submenu->route(
                            'admin.settings.index',
                            trans('global.general'),
                            [],
                            [
                                'icon' => 'fa fa-gear'
                            ]
                        );

                        foreach ($modules_list as $module) {

                            $config_base_tag = strtolower($module->name) . '.admin.sidebar.settings.';
                            $route = Config::get($config_base_tag . 'route');

                            if (!is_null($route)) {
                                $submenu->route(
                                    $route,
                                    $module->name,
                                    [],
                                    [
                                        'icon' => Config::get($config_base_tag . 'icon')
                                    ]
                                );
                            }
                        }
                    },
                    [],
                    [
                        'icon' => 'fa fa-gears'
                    ]
                );
            }
        );
        return [
            'sidebar' => [
                'menu' => Menu::render('navbar', config('core.backend.menus.sidebar.presenters'))
            ]
        ];
    }

    /**
     * @return array
     */
    private function footer()
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