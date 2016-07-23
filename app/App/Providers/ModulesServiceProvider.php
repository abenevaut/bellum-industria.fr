<?php namespace cms\App\Providers;

use Illuminate\Foundation\AliasLoader;
use Pingpong\Modules\ModulesServiceProvider as PingpongModulesServiceProvider;
use Pingpong\Modules\Facades\Module;

/**
 * Class ModulesServiceProvider
 * @package cms\App\Providers
 */
class ModulesServiceProvider extends PingpongModulesServiceProvider
{

	/**
	 *
	 */
	public function register()
	{
		$this->registerServices();
		$this->setupStubPath();
		$this->registerProviders();

		$this->app->booting(function () {
		

			$loader = AliasLoader::getInstance();
			$loader->alias('Widget', 'Pingpong\Widget\WidgetFacade');

			$file = base_path('core/widgets.php');

			if (file_exists($file))
			{
				include $file;
			}

			foreach (Module::getOrdered() as $module)
			{
				$file = $module->getPath() . '/widgets.php';

				if (file_exists($file))
				{
					include $file;
				}
			}
		});
	}

	/**
	 * Register providers.
	 */
	protected function registerProviders()
	{
		$this->commands('cms\Console\Commands\ModulesPublishCommand');
		$this->commands('cms\Console\Commands\ModulesPublishMigrationCommand');
		$this->commands('cms\Console\Commands\ModulesUpdateCommand');
		$this->commands('cms\Console\Commands\ModuleMakeCommand');
		$this->app->register('Pingpong\Modules\Providers\ContractsServiceProvider');
	}

}
