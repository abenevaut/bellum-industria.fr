<?php

// This is global bootstrap for autoloading

/*
 * Run Laravel
 */

require 'bootstrap/autoload.php';

/*
|--------------------------------------------------------------------------
| Create The Application
|--------------------------------------------------------------------------
|
| The first thing we will do is create a new Laravel application instance
| which serves as the "glue" for all the components of Laravel, and is
| the IoC container for the system binding all of the various parts.
|
*/

$app = new Illuminate\Foundation\Application(
    realpath(__DIR__ . '/../')
);

/*
|--------------------------------------------------------------------------
| Bind Important Interfaces
|--------------------------------------------------------------------------
|
| Next, we need to bind some important interfaces into the container so
| we will be able to resolve them when needed. The kernels serve the
| incoming requests to this application from both the web and CLI.
|
*/

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    Core\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    Core\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    Core\Exceptions\Handler::class
);

$app->instance('request', new \Illuminate\Http\Request);

/*
 * Force testing environment
 */
$app->useEnvironmentPath($app->environmentPath() . '/tests');
$app->loadEnvironmentFrom('.env.testing');

$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();

/**
 * Prepare stuff for execution
 */

// Prepare SQlite DB
exec('rm ' . base_path(env('TEST_SQLITE_DB_PATH')));
exec('cp ' . base_path(env('TEST_SQLITE_DB_TO_COPY')) . ' ' . base_path(env('TEST_SQLITE_DB_PATH')));

// Prepare fake .env.installer file
exec('rm ' . base_path(env('TEST_ENV_INSTALLER_PATH')));
exec('cp ' . base_path(env('TEST_ENV_INSTALLER_TO_COPY')) . ' ' . base_path(env('TEST_ENV_INSTALLER_PATH')));

// Could not be integrated in project because of event function conflict between HOA lib and Laravel
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-core.html core"));
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-modules.html modules"));

Artisan::call('module:publish-migration');
Artisan::call('migrate');
Artisan::call('db:seed', ['--class' => 'testingSeeder']);
