<?php // Here you can initialize variables that will be available to your tests

require 'bootstrap/autoload.php';
$app = require 'bootstrap/app.php';
$app->loadEnvironmentFrom($settings['l5_env_file']);
$app->instance('request', new \Illuminate\Http\Request);
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();

/**
 * Prepare stuff for execution
 */

// Prepare SQlite DB
//exec('rm ' . base_path(env('TEST_SQLITE_DB_PATH')));
//exec('cp ' . base_path(env('TEST_SQLITE_DB_TO_COPY')) . ' ' . base_path(env('TEST_SQLITE_DB_PATH')));

// Prepare fake .env.installer file
//exec('rm ' . base_path(env('TEST_ENV_INSTALLER_PATH')));
//exec('cp ' . base_path(env('TEST_ENV_INSTALLER_TO_COPY')) . ' ' . base_path(env('TEST_ENV_INSTALLER_PATH')));

// Could not be integrated in project because of event function conflict between HOA lib and Laravel
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-core.html core"));
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-modules.html modules"));

//Artisan::call('module:publish-migration');
//Artisan::call('migrate');
//Artisan::call('db:seed', ['--class' => 'testingSeeder']);
