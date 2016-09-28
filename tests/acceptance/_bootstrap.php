<?php // Here you can initialize variables that will be available to your tests

require 'bootstrap/autoload.php';
$app = require 'bootstrap/app.php';
$app->loadEnvironmentFrom('test/_data/.env.testing');
$env = $app->detectEnvironment(function ()
{

    $environmentPath = __DIR__ . '/../.env';

    if (file_exists($environmentPath))
    {
        $setEnv = trim(file_get_contents($environmentPath));
    }
    else
    {
        $setEnv = 'installer';
    }

    putenv('CORE_ENV=' . $setEnv);

    $dotenv = new \Dotenv\Dotenv('test/_data/', '.env' . '.' . getenv('CORE_ENV')); // Laravel 5.2
    $dotenv->overload(); // this is important
});

$app->instance('request', new \Illuminate\Http\Request);
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();
