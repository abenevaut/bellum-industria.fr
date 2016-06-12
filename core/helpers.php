<?php

use Illuminate\Support\Facades\Auth;
use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;

if (!function_exists('slugify'))
{
	/**
	 * @param $text
	 *
	 * @return bool|mixed|string
	 */
	function slugify($text)
	{
		// replace non letter or digits by -
		$text = preg_replace('~[^\\pL\d]+~u', '-', $text);

		// trim
		$text = trim($text, '-');

		// transliterate
		$text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

		// lowercase
		$text = strtolower($text);

		// remove unwanted characters
		$text = preg_replace('~[^-\w]+~', '', $text);

		if (empty($text))
		{
			return 'n-a';
		}

		return $text;
	}
}

if (!function_exists('css_file_rev'))
{
	/**
	 * @param $file
	 *
	 * @return mixed
	 */
	function css_file_rev($file)
	{
		$current_theme = \Theme::getCurrent();
		$list = json_decode(\File::get(base_path() . '/public/themes/' . $current_theme . '/rev/css.manifest.json'));

		return $list->{$file};
	}
}

if (!function_exists('cmsview'))
{
	/**
	 * @param       $view
	 * @param array $data
	 * @param null  $view_prefix
	 * @param null  $current_module
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	function cmsview($view, $data = [], $view_prefix = null, $current_module = null)
	{
		if (is_null($view_prefix))
		{
			$view_prefix = \Theme::getCurrent() . '::';
		}

		$current_prefix = $view_prefix;

		try
		{
			\Theme::view($view);
		}
		catch (\InvalidArgumentException $e)
		{
			$current_prefix = $current_module;
		}

		return view($current_prefix . $view, $data);
	}
}

if (!function_exists('cmsview_prefix'))
{
	/**
	 * @param      $view
	 * @param null $view_prefix
	 * @param null $current_module
	 *
	 * @return null|string
	 */
	function cmsview_prefix($view, $view_prefix = null, $current_module = null)
	{
		if (is_null($view_prefix))
		{
			$view_prefix = \Theme::getCurrent() . '::';
		}

		$current_prefix = $view_prefix;

		try
		{
			\Theme::view($view);
		}
		catch (\InvalidArgumentException $e)
		{
			$current_prefix = $current_module;
		}

		return $current_prefix;
	}
}

if (!function_exists('cmsinstalled'))
{
	/**
	 * Allow to know if CMS is installed.
	 *
	 * @return bool True if CMS installed
	 */
	function cmsinstalled()
	{
		return env('CORE_INSTALLED');
	}
}

if (!function_exists('cmsuser_can_see_env'))
{
	/**
	 * Is the current user able to see environments?
	 *
	 * @return bool
	 */
	function cmsuser_can_see_env()
	{
		return Auth::check()
		&& (EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE === EnvironmentFacade::current())
		&& (
			(
				Auth::user()->hasRole(RoleRepositoryEloquent::ADMIN)
				|| Auth::user()->hasPermission(PermissionRepositoryEloquent::ACCESS_ADMIN_PANEL)
			)
			|| Auth::user()->hasPermission(PermissionRepositoryEloquent::SEE_ENVIRONMENT)
		);
	}
}

if (!function_exists('cmsuser_can_manage_env_items'))
{
	/**
	 * Is the current user able to manage environments items?
	 *
	 * @return bool
	 */
	function cmsuser_can_manage_env_items()
	{
		return Auth::check()
		&& (EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE === EnvironmentFacade::current())
		&& (
			(
				Auth::user()->hasRole(RoleRepositoryEloquent::ADMIN)
				|| Auth::user()->hasPermission(PermissionRepositoryEloquent::ACCESS_ADMIN_PANEL)
			)
			|| Auth::user()->hasPermission(PermissionRepositoryEloquent::MANAGE_ENVIRONMENT_ITEMS)
		);
	}
}

if (!function_exists('cmsuser_is_admin'))
{
	/**
	 * Is the current user able to access administration?
	 *
	 * @return bool
	 */
	function cmsuser_is_admin()
	{
		return Auth::check()
		&& (
			Auth::user()->hasRole(RoleRepositoryEloquent::ADMIN)
			|| Auth::user()->hasPermission(PermissionRepositoryEloquent::ACCESS_ADMIN_PANEL)
		);
	}
}
