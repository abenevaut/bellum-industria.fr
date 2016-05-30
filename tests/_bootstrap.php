<<<<<<< HEAD
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
=======
<?php // This is global bootstrap for autoloading

define('C3_CODECOVERAGE_ERROR_LOG_FILE', ('/tests/_output/c3_error.log')); //Optional (if not set the default c3 output dir will be used)
include 'c3.php';

define('MY_APP_STARTED', true);

// Could not be integrated in project because of event function conflict between HOA lib and Laravel
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-core.html core"));
//exec(base_path("bin/phpmetrics --report-html=tests/_output/phpmetrics-modules.html modules"));
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406
