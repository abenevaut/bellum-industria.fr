<?php namespace Core\Providers;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Module;

/**
 * Class ModulesServiceProvider
 * @package Core\Providers
 */
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

            $file = base_path('core/widgets.php');

            if (file_exists($file)) {
                include $file;
            }

            foreach (Module::getOrdered() as $module) {

                $file = $module->getPath() . '/widgets.php';

                if (file_exists($file)) {
                    include $file;
                }
            }
        });
    }
}
