<?php
namespace App;

use Widget;
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
    return env('APP_SITE_NAME');
});

/**
 * Return the app site description
 */
Widget::register('site_description', function () {
    return env('APP_SITE_DESCRIPTION');
});
