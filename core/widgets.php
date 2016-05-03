<?php

namespace App;

use Widget;
use HTML;
use CVEPDB\Settings\Facades\Settings;

/*
 * Retrieve avatar from gravatar and return HTML IMG based on HTML::image
 */
Widget::register('gravatar', function ($email, $attributs = []) {
	return HTML::image(
		'http://www.gravatar.com/avatar/' . md5($email),
		'Gravatar',
		$attributs
	);
});

/*
 * Return the app site name
 */
Widget::register('site_name', function () {
	return Settings::get('core.site.name');
});

/*
 * Return the app site description
 */
Widget::register('site_description', function () {
	return Settings::get('core.site.description');
});
