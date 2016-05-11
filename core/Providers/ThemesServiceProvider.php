<?php namespace Core\Providers;

use Pingpong\Themes\ThemesServiceProvider as PingpongThemesServiceProvider;

/**
 * Class ThemesServiceProvider
 * @package Core\Providers
 */
class ThemesServiceProvider extends PingpongThemesServiceProvider
{

	/**
	 * Register commands.
	 */
	protected function registerCommands()
	{
		return null;
	}

}
