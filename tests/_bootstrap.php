<?php

// This is global bootstrap for autoloading

require 'bootstrap/autoload.php';
$app = require 'bootstrap/app.php';

$app->loadEnvironmentFrom('.env.testing');
$app->instance('request', new \Illuminate\Http\Request);
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();

exec('rm ' . base_path(env('TEST_SQLITE_DB_PATH')));
exec('cp ' . base_path('TEST_SQLITE_DB_TO_COPY') . ' ' . storage_path(env('TEST_SQLITE_DB_PATH')));

//Artisan::call('migrate');
