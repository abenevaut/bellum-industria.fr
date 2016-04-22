<?php

// This is global bootstrap for autoloading

require 'bootstrap/autoload.php';
$app = require 'bootstrap/app.php';

$app->loadEnvironmentFrom('.env.testing');
$app->instance('request', new \Illuminate\Http\Request);
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();

exec('rm ' . base_path(env('TEST_SQLITE_DB_PATH')));
exec('cp ' . base_path(env('TEST_SQLITE_DB_TO_COPY')) . ' ' . base_path(env('TEST_SQLITE_DB_PATH')));

// Could not be integrated in project because of event function conflict between HOA lib and Laravel
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-core.html core"));
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-modules.html modules"));

//Artisan::call('migrate');
