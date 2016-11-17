<?php namespace cms\Modules\Users;

use CVEPDB\Widgets\App\Facades\WidgetsFacade;
use CVEPDB\Settings\Facades\Settings;

/**
 * Output site name
 */
WidgetsFacade::register('site_name', function () {
	return cmsinstalled() ? Settings::get('cms.site.name') : '';
});

/**
 * Output site description
 */
WidgetsFacade::register('site_description', function () {
	return cmsinstalled() ? Settings::get('cms.site.description') : '';
});
