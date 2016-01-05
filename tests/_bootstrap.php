<?php
// This is global bootstrap for autoloading

require 'bootstrap/autoload.php';
$app = require 'bootstrap/app.php';

$app->loadEnvironmentFrom('.env.testing');
$app->instance('request', new \Illuminate\Http\Request);
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();


exec('rm ' . storage_path(env('SQLITE_DB_PATH')));
exec('cp '.storage_path('databases/database.sqlite').' '.storage_path(env('SQLITE_DB_PATH')));

Artisan::call('migrate');
//Artisan::call('db:seed', ['--class' => 'TestingDatabaseSeeder']);

exec("php artisan serve >/dev/null 2>&1 &");
