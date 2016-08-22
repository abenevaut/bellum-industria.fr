<?php

use Illuminate\Support\Facades\Auth;
use Pingpong\Menus\MenuFacade;
use cms\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;

if (!function_exists('adminlte_menu_header'))
{
	/**
	 * Display the header menu of AdminLte theme.
	 *
	 * @return string
	 */
	function adminlte_menu_header()
	{
		MenuFacade::create(
			'header_navigation',
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

		return MenuFacade::render(
			'header_navigation',
			'\panacea\App\Services\AdminLteMenuAppHeaderPresenter'
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
		MenuFacade::create(
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

		return MenuFacade::render(
			'header_navigation_mobile',
			'\panacea\App\Services\AdminLteMenuFrontHeaderPresenter'
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
		MenuFacade::create(
			'sidebar_navigation',
			function ($menu)
			{


					$menu->route(
						'catalog.customersrequests.my_requests.index',
						trans('navigation.customersrequests'),
						[],
						[
							'icon' => 'fa fa-folder-open'
						]
					);


			}
		);

		return MenuFacade::render(
			'sidebar_navigation',
			'\panacea\App\Services\AdminLteMenuAppSidebarPresenter'
		);
	}
}
