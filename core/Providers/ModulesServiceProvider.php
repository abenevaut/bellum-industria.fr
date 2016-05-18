<?php namespace Core\Providers;

use Illuminate\Foundation\AliasLoader;
use Pingpong\Modules\ModulesServiceProvider as PingpongModulesServiceProvider;
use Module;

/**
 * Class ModulesServiceProvider
 * @package Core\Providers
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

		$this->app->booting(function ()
		{

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
		$this->commands('Pingpong\Modules\Commands\PublishCommand');
		$this->commands('Pingpong\Modules\Commands\PublishMigrationCommand');
		$this->commands('Pingpong\Modules\Commands\UpdateCommand');
		$this->app->register('Pingpong\Modules\Providers\ContractsServiceProvider');
	}

}
