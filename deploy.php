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
		'vendor'
	]);

	switch ($server_name)
	{
		case 'production':
		{
			// Composer options
			env('composer_options', 'install --no-dev --prefer-dist --optimize-autoloader --no-progress --no-interaction');

			// Laravel & CMS shared file
			set('shared_files', ['production/.env', 'production/.env.production']);

			break;
		}
		case 'staging':
		{
			// Laravel & CMS shared file
			set('shared_files', ['staging/.env', 'staging/.env.staging']);

			break;
		}
		case 'testing':
		{
			// Laravel & CMS shared file
			set('shared_files', ['staging/.env', 'staging/.env.testing']);

			break;
		}
	}
})->desc('Initialize project');

task('cms:prepare', function ()
{
	run("cd {{release_path}} && cd resources/themes/adminlte/assets && bower install && cd -");
	run("cd {{release_path}} && cd resources/themes/lumen/assets && bower install && cd -");
	run("cd {{release_path}} && php artisan cms:module:publish");
	run("cd {{release_path}} && php artisan cms:module:publish-migration");
	run("cd {{release_path}} && php artisan cms:theme:publish");
})->desc('Prepare project');

task('deploy', [
	'cms:initialize',
	'deploy:prepare',
	'deploy:release',
	'deploy:update_code',
	'deploy:shared',
	'deploy:symlink',
	'deploy:vendors',
	'cms:prepare',
	'cleanup'
])->desc('Deploy your project');
