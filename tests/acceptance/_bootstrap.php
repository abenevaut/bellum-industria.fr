<<<<<<< HEAD
<?php
// Here you can initialize variables that will be available to your tests
=======
<?php // Here you can initialize variables that will be available to your tests

require 'bootstrap/autoload.php';
$app = require 'bootstrap/app.php';
$app->loadEnvironmentFrom($settings['l5']['env']['file']);
$app->instance('request', new \Illuminate\Http\Request);
$app->make('Illuminate\Contracts\Http\Kernel')->bootstrap();
>>>>>>> e3011fbb5aedfa377b00e2740ac2dca3d5e31406
