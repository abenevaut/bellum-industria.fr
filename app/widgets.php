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
