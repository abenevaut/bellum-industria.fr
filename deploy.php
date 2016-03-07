<?php

// All Deployer recipes are based on `recipe/common.php`.
require 'recipe/common.php';
require 'vendor/deployphp/recipes/recipes/local.php';

serverList('deploy.yml');
// Where we run the deployement
env('local_deploy_path', './deployer');
// Removes old releases and keeps the last 5
set('keep_releases', 5);

set('repository', 'git@gitlab.com:cvepdb/site.git');
env('branch', 'master');

// Bedrock shared file
set('shared_files', ['.env']);
// Bedrock writable dirs
set('writable_dirs', ['storage']);

task('deploy', [
    'local:prepare',
    'deploy:prepare',
    'local:release',
    'deploy:release',
    'local:update_code',
    'local:vendors',
    'deploy:shared',
    //'deploy:writable',
    'local:symlink',
    'deploy:symlink',
    'cleanup',
    'local:cleanup'
])->desc('Deploy your project');

task('cvepdb:vendor', function() {
    upload(env('local_release_path'), env('release_path'));
})->desc('Deploy your project');

task('cvepdb:git', function() {
    runLocally('git submodule init');
    runLocally('git submodule update');
})->desc('Deploy your project');

task('cvepdb:gulp', function() {
    runLocally('npm install');
    runLocally('gulp production');
})->desc('Deploy your project');

after('local:update_code', 'cvepdb:git');
after('local:git', 'cvepdb:gulp');
after('local:vendors', 'cvepdb:vendor');