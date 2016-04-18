<?php

namespace Core\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Module;

class ModulesServiceProvider extends ServiceProvider
{
    /**
     *
     */
    public function register()
    {
        $this->app->booting(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Widget', 'Pingpong\Widget\WidgetFacade');

            foreach (Module::getOrdered() as $module) {

                $file = $module->getPath() . '/widgets.php';

                if (file_exists($file)) {
                    include $file;
                }

            }
        });
    }

}
