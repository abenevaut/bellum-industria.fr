<?php namespace cms\Modules\Users;

use Widget;
use CVEPDB\Settings\Facades\Settings;

Widget::register('field_address', 'cms\App\Widgets\Address\AddressFields');
Widget::register('field_environments', 'cms\App\Widgets\Environments\EnvironmentsFields');
Widget::register('field_roles', 'cms\App\Widgets\Roles\RolesFields');
Widget::register('field_users', 'cms\App\Widgets\Users\UsersFields');

/**
 * Output google analytics script
 */
Widget::register('site_name', function () {
	return cmsinstalled() ? Settings::get('cms.site.name') : '';
});

/**
 * Output google analytics script
 */
Widget::register('site_description', function () {
	return cmsinstalled() ? Settings::get('cms.site.description') : '';
});
