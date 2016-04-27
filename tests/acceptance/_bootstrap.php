<?php // Here you can initialize variables that will be available to your tests

require 'bootstrap/autoload.php';
$app = require 'bootstrap/app.php';
$app->loadEnvironmentFrom($settings['l5']['env']['file']);
$app->instance('request', new \Illuminate\Http\Request);
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

// Prepare migration files
Artisan::call('module:publish-migration');

switch ($settings['l5']['env']['name'])
{
    case 'notinstalled':
    {

        break;
    }
    default:
    {
        Artisan::call('migrate');
        Artisan::call('db:seed', ['--class' => 'testingSeeder']);
        break;
    }
}
