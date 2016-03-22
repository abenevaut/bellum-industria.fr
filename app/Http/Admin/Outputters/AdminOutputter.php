<?php

namespace App\Http\Admin\Outputters;

use App;
use Config;
use Menu;
use Module;
use App\Http\Outputters\CoreOutputter;

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
                + $this->admin_data_footer()
        );
    }

    private function admin_data_sidebar()
    {
        Menu::create('navbar', function ($menu) {
            $menu->header('Main navigation');

            foreach (Module::getOrdered() as $module) {

                $route = Config::get(strtolower($module->name) . '.admin.route');

                if (!is_null($route)) {
                    $menu->route(
                        $route,
                        Config::get(strtolower($module->name) . '.name'),
                        [],
                        [
                            'icon' => Config::get(strtolower($module->name) . '.admin.icon')
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