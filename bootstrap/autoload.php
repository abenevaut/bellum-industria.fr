<?php

define('LARAVEL_START', microtime(true));

/*
|--------------------------------------------------------------------------
| Register The Composer Auto Loader
|--------------------------------------------------------------------------
|
| Composer provides a convenient, automatically generated class loader
| for our application. We just need to utilize it! We'll require it
| into the script here so that we do not have to worry about the
| loading of any our classes "manually". Feels great to relax.
|
*/

<<<<<<< HEAD
require __DIR__.'/../vendor/autoload.php';
=======
$composer_autoload = __DIR__ . '/../vendor/autoload.php';

if (!file_exists($composer_autoload))
{
	echo 'Missing vendor files, try running "composer install" or use the Wizard installer.' . PHP_EOL;
	exit(1);
}
require $composer_autoload;
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406

/*
|--------------------------------------------------------------------------
| Include The Compiled Class File
|--------------------------------------------------------------------------
|
| To dramatically increase your application's performance, you may use a
| compiled class file which contains all of the classes commonly used
| by a request. The Artisan "optimize" is used to create this file.
|
*/

<<<<<<< HEAD
$compiledPath = __DIR__.'/cache/compiled.php';

if (file_exists($compiledPath)) {
    require $compiledPath;
=======
$compiledPath = __DIR__ . '/cache/compiled.php';

if (file_exists($compiledPath))
{
	require $compiledPath;
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406
}
