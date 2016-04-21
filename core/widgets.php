<?php namespace App;

use Widget;
use Settings;
use HTML;

/**
 * Retrieve avatar from gravatar and return HTML IMG based on HTML::image
 */
Widget::register('gravatar', function ($email, $attributs = []) {
    return HTML::image(
        'http://www.gravatar.com/avatar/' . md5($email),
        "Gravatar",
        $attributs
    );
});

/**
 * Return the app site name
 */
Widget::register('site_name', function () {
    return Settings::get('APP_SITE_NAME', env('APP_SITE_NAME'));
});

/**
 * Return the app site description
 */
Widget::register('site_description', function () {
    return Settings::get('APP_SITE_DESCRIPTION', env('APP_SITE_DESCRIPTION'));
});
