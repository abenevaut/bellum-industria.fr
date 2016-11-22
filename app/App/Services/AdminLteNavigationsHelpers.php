<?php

if (!function_exists('adminlte_menu_header'))
{
	/**
	 * Display the header menu of AdminLte theme.
	 *
	 * @return string
	 */
	function adminlte_menu_header()
	{
		$modules_list = \Module::getOrdered();

		\Menu::create(
			'header_navigation',
			function ($menu) use ($modules_list)
			{

				$menu->url(
					'/',
					trans('menus.view_website'),
					[],
					[
						'icon'   => 'fa fa-globe',
						'target' => '_blank'
					]
				);

				$menu->dropdown(
					trans('global.shortcuts'),
					function ($submenu) use ($modules_list)
					{
						$i = 0;

						foreach ($modules_list as $module)
						{
							$config_base_tag = strtolower($module->name) . '.admin.sidebar.shortcuts.';
							$route = \Config::get($config_base_tag . 'route');

							if (!is_null($route))
							{
								if ($i)
								{
									$submenu->divider();
								}

								$submenu->route(
									$route,
									$module->name,
									[],
									[
										'icon' => \Config::get($config_base_tag . 'icon')
									]
								);

								$i++;
							}
						}

					},
					[],
					[
						'icon' => 'fa fa-fast-forward'
					]
				);

			});

		return \Menu::render(
			'header_navigation',
			settings('cms.backend.menus.header.presenters.web')
		);
	}
}

if (!function_exists('adminlte_menu_front_mobile'))
{
	/**
	 * Display the header menu of AdminLte theme for mobile on front layout.
	 *
	 * @return string
	 */
	function adminlte_menu_front_mobile()
	{
		\Menu::create(
			'header_navigation_mobile',
			function ($menu)
			{

				$menu->route(
					'home',
					trans('navigation.home'),
					[],
					[
						'icon' => 'fa fa-dashboard'
					]
				);

			}
		);

		return \Menu::render(
			'header_navigation_mobile',
			settings('cms.backend.menus.header.presenters.mobile')
		);
	}
}

if (!function_exists('adminlte_menu_sidebar'))
{
	/**
	 * Display the sidebar menu of AdminLte theme on app layout.
	 *
	 * @return string
	 */
	function adminlte_menu_sidebar()
	{
		$modules_list = \Module::getOrdered();

		\Menu::create(
			'sidebar_navigation',
			function ($menu) use ($modules_list)
			{
				$menu->header(trans('menus.main_navigation'));

				foreach ($modules_list as $module)
				{
					$config_base_tag = strtolower($module->name) . '.admin.sidebar.menu.';
					$route = \Config::get($config_base_tag . 'route');

					if (!is_null($route))
					{
						$menu->route(
							$route,
							$module->name,
							[],
							[
								'icon' => \Config::get($config_base_tag . 'icon')
							]
						);
					}
				}

				$menu->header(trans('global.settings'));

				if (\Gate::allows('super-administrator'))
				{
					$menu->route(
						'backend.environments.index',
						trans('global.environment_s'),
						[],
						[
							'icon' => 'fa fa-cubes'
						]
					);
				}

				$menu->dropdown(
					trans('global.settings'),
					function ($submenu) use ($modules_list)
					{


						$submenu->route(
							'backend.settings.index',
							trans('global.general'),
							[],
							[
								'icon' => 'fa fa-gear'
							]
						);

						foreach ($modules_list as $module)
						{
							$config_base_tag = strtolower($module->name) . '.admin.sidebar.settings.';
							$route = \Config::get($config_base_tag . 'route');

							if (!is_null($route))
							{
								$submenu->route(
									$route,
									$module->name,
									[],
									[
										'icon' => \Config::get($config_base_tag . 'icon')
									]
								);
							}
						}
					},
					[],
					[
						'icon' => 'fa fa-gears'
					]
				);
			});

		return \Menu::render(
			'sidebar_navigation',
			settings('cms.backend.menus.sidebar.presenters')
		);
	}
}
