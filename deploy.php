<?php

// All Deployer recipes are based on `recipe/common.php`.
require 'recipe/common.php';
require 'vendor/deployphp/recipes/recipes/local.php';

serverList('deploy.yml');
// Where we run the deployement
env('local_deploy_path', './deployer');
// Removes old releases and keeps the last 5
set('keep_releases', 5);

set('repository', 'https://gitlab.com/cvepdb/cms.git');
env('branch', 'master');
env('env_vars', ''); // For Composer installation. Like SYMFONY_ENV=prod
env('composer_options', 'install --no-dev --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction');
// CMS shared file
set('shared_files', ['.env', '.env.production']);
// Todo : CMS shared directories
//set('shared_dirs', [
//    'storage/app',
//    'storage/framework/cache',
//    'storage/framework/sessions',
//    'storage/framework/views',
//    'storage/logs',
//]);
// CMS writable dirs
set('writable_dirs', ['bootstrap/cache', 'storage']);
// Specific to OVH Mutualised
//env('bin/php', function () {
//    return run('which php.TEST.5')->toString();
//});
// Composer local path
env('bin/composer', function () {
    $composer = runLocally('which composer')->toString();
    return $composer;
});

task('cvepdb:git', function() {
    runLocally('git submodule init');
    runLocally('git submodule update');
})->desc('Deploy your project');

task('cvepdb:vendors', function() {
    upload(env('local_release_path'), env('release_path'));
})->desc('Deploy your project');

task('local:shared', function() {

    $remoteSharedPath = "{{deploy_path}}/shared";
    $localSharedPath = "{{local_deploy_path}}/shared";

    foreach (get('shared_files') as $file) {
        // Current file directory path
        $dirname = dirname($file);
        // Remove from source.
        run("if [ -f $(echo {{release_path}}/$file) ]; then rm -rf {{release_path}}/$file; fi");
        // Ensure dir is available in release
        run("if [ ! -d $(echo {{release_path}}/$dirname) ]; then mkdir -p {{release_path}}/$dirname;fi");
        // Create dir of shared file
        run("mkdir -p $remoteSharedPath/" . $dirname);
        // Send local shared file to remote shared directory
        upload("$localSharedPath/$file", "$remoteSharedPath/$file");
        // Symlink shared dir to release dir
        run("ln -nfs $remoteSharedPath/$file {{release_path}}/$file");
    }
})->desc('Creating symlinks for shared files');

task('deploy', [
    'local:prepare',
    'deploy:prepare',
    'local:release',
    'deploy:release',
    'local:update_code',
    'local:vendors',
    'local:shared',
    //'deploy:writable',
    'deploy:symlink',
    'cleanup',
    'local:cleanup'
])->desc('Deploy your project');

after('local:update_code', 'cvepdb:git');
after('local:vendors', 'cvepdb:vendors');