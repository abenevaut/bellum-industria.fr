<?php

// All Deployer recipes are based on `recipe/common.php`.
require 'recipe/common.php';

serverList('deploy.yml');
set('ssh_type', 'ext-ssh2');

// Where we run the deployement
env('local_deploy_path', './deployer');

// Removes old releases and keeps the last 5
set('keep_releases', 5);

set('repository', 'git@gitlab.com:cvepdb/site.git');

//set('http_user', 'cvepdb-www');
set('writable_use_sudo', false);

task('cms:initialize', function ()
{
	$server_name = \Deployer\Task\Context::get()
		->getServer()
		->getConfiguration()
		->getName();

	env('branch', 'master');

	env('composer_options', 'install --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction');

	// Laravel & CMS writable directories
	set('writable_dirs', ['bootstrap/cache', 'storage']);

	// Laravel & CMS shared directories
	set('shared_dirs', [
		'public/uploads',
		'storage/app',
		'storage/framework/cache',
		'storage/framework/debugbar',
		'storage/framework/sessions',
		'storage/framework/views',
		'storage/logs',
		'storage/medias'
	]);

	// Laravel & CMS shared file
	set('shared_files', [
		$server_name . '/.env',
		$server_name . '/.env.' . $server_name
	]);

	switch ($server_name)
	{
		case 'production':
		{
			// Composer options
			env('composer_options', 'install --no-dev --prefer-dist --optimize-autoloader --no-progress --no-interaction');
			break;
		}
		case 'staging':
		{
			break;
		}
	}
})->desc('Initialize project');

task('cms:prepare', function ()
{
	run("php {{deploy_path}}/current/artisan module:publish");
	run("php {{deploy_path}}/current/artisan module:publish-migration");
	run("php {{deploy_path}}/current/artisan theme:publish");
})->desc('Prepare project');

task('cms:uploads_env_files', function ()
{
	$sharedPath = "{{deploy_path}}/shared";

	foreach (get('shared_files') as $file)
	{
		$basefilename = basename($file);

		// Send file to host
		upload(__DIR__ . '/deployer/shared/' . $file, $sharedPath . '/' . $basefilename);
		// Remove from source.
		run("if [ -f $(echo {{release_path}}/$basefilename) ]; then rm -rf {{release_path}}/$basefilename; fi");
		// Symlink shared dir to release dir
		run("ln -nfs $sharedPath/$basefilename {{release_path}}/$basefilename");
	}
})->desc('Uploads environment files');

task('cms:shared', function ()
{
	$sharedPath = "{{deploy_path}}/shared";

	foreach (get('shared_dirs') as $dir)
	{
		// Remove from source.
		run("if [ -d $(echo {{release_path}}/$dir) ]; then rm -rf {{release_path}}/$dir; fi");
		// Create shared dir if it does not exist.
		run("mkdir -p $sharedPath/$dir");
		// Create path to shared dir in release dir if it does not exist.
		// (symlink will not create the path and will fail otherwise)
		run("mkdir -p `dirname {{release_path}}/$dir`");
		// Symlink shared dir to release dir
		run("ln -nfs $sharedPath/$dir {{release_path}}/$dir");
	}
})->desc('Creating symlinks for shared files');

task('deploy:up', function ()
{
	$output = run('if [ -d $(echo {{deploy_path}}/current/) ]; then php {{deploy_path}}/current/artisan up; fi');
	writeln('<info>' . $output . '</info>');
})->desc('Disable maintenance mode');

task('deploy:down', function ()
{
	$output = run('if [ -d $(echo {{deploy_path}}/current/) ]; then php {{deploy_path}}/current/artisan down; fi');
	writeln('<error>' . $output . '</error>');
})->desc('Enable maintenance mode');

task('deploy', [
	'deploy:down',
	'cms:initialize',
	'deploy:prepare',
	'deploy:release',
	'deploy:update_code',
	'cms:shared',
	'cms:uploads_env_files',
	'deploy:symlink',
	'deploy:writable',
	'deploy:vendors',
	'cleanup',
	'cms:prepare',
	'deploy:up'
])->desc('Deploy your project');
