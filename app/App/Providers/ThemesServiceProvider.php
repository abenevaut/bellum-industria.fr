<?php namespace cms\App\Providers;

use Pingpong\Themes\ThemesServiceProvider as PingpongThemesServiceProvider;

/**
 * Class ThemesServiceProvider
 * @package cms\App\Providers
 */
class ThemesServiceProvider extends PingpongThemesServiceProvider
{

	/**
	 * Register commands.
	 */
	protected function registerCommands()
	{
		$this->commands('Core\Console\Commands\ThemesPublishCommand');
	}

}
