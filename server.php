<?php

/**
<<<<<<< HEAD
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */

=======
 * Laravel - A PHP Framework For Web Artisans.
 *
 * @author   Taylor Otwell <taylorotwell@gmail.com>
 */
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
