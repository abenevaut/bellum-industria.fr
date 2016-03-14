<?php

namespace App\Http\Admin\Outputters;

use App;
use Config;
use Menu;
use Module;
use CVEPDB\Services\Outputters\AbsLaravelOutputter;

class AdminOutputter extends AbsLaravelOutputter
{
    public function __construct()
    {
        parent::__construct();

        $this->addBreadcrumb('Dashboard', 'admin/');
        $this->setBreadcrumbDivider('');
        $this->breadcrumbs->setListElement('li');
    }

    public function output($view, $data)
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

            foreach (Module::enabled() as $module) {
                $menu->route(
                    Config::get(strtolower($module->name) . '.admin.route'),
                    Config::get(strtolower($module->name) . '.name'),
                    [],
                    [
                        'icon' => Config::get(strtolower($module->name) . '.admin.icon')
                    ]
                );
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