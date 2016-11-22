<?php namespace cms\Modules\Users;

/**
 * Output site name
 */
\Widget::register('site_name', function () {
	return cmsinstalled() ? \Settings::get('cms.site.name') : '';
});

/**
 * Output site description
 */
\Widget::register('site_description', function () {
	return cmsinstalled() ? \Settings::get('cms.site.description') : '';
});
