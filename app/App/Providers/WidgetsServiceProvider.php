<?php namespace cms\App\Providers;

use Illuminate\Foundation\AliasLoader;
use CVEPDB\Widgets\App\Providers\WidgetsServiceProvider as CVEPDBWidgetsServiceProvider;
use CVEPDB\Widgets\Domain\Widgets\Widgets\Repositories\WidgetsRepository;

/**
 * Class WidgetsServiceProvider
 * @package cms\App\Providers
 */
class WidgetsServiceProvider extends CVEPDBWidgetsServiceProvider
{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 */
	public function register()
	{
		$this->app['widgets'] = $this->app->share(function ($app)
		{
			$blade = $app['view']
				->getEngineResolver()
				->resolve('blade')
				->getCompiler();

			return new WidgetsRepository($blade, $app);
		});

		$this->app->booting(function ()
		{
			AliasLoader::getInstance()
				->alias('Widget', 'CVEPDB\Widgets\App\Facades\WidgetsFacade');

			$file = app_path('App/Widgets/widgets.php');

			if (file_exists($file))
			{
				include $file;
			}

			foreach (\Module::getOrdered() as $module)
			{
				$file = base_path(
					'modules/' . ucfirst($module) . '/App/Widgets/widgets.php'
				);

				if (file_exists($file))
				{
					include $file;
				}
			}
		});
	}
}
