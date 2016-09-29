<?php

// All Deployer recipes are based on `recipe/common.php`.
require 'recipe/common.php';
require 'vendor/deployphp/recipes/recipes/local.php';

serverList('deploy.yml');
set('ssh_type', 'ext-ssh2');

// Where we run the deployement
env('local_deploy_path', './deployer');

// Removes old releases and keeps the last 5
set('keep_releases', 5);

set('repository', 'https://gitlab.com/cvepdb/cms.git');

// Specific to OVH Mutualised
//env('bin/php', function () {
//    return run('which php.TEST.5')->toString();
//});

// Composer local path
env('bin/composer', function ()
{
	return runLocally('which composer')->toString();
});

task('cms:initialize', function ()
{
	$server_name = \Deployer\Task\Context::get()
		->getServer()
		->getConfiguration()
		->getName();

	env('composer_options', 'install --verbose --prefer-dist --optimize-autoloader --no-progress --no-interaction');

	// Laravel & CMS writable directories
	set('writable_dirs', ['bootstrap/cache', 'storage']);

	switch ($server_name)
	{
		case 'production':
		{
			env('branch', 'master');

			// Composer options
			env('composer_options', 'install --no-dev --prefer-dist --optimize-autoloader --no-progress --no-interaction');

			// CMS shared file
			set('shared_files', ['production/.env', 'production/.env.production']);

			// Todo : CMS shared directories
			//set('shared_dirs', [
			//    'storage/app',
			//    'storage/framework/cache',
			//    'storage/framework/sessions',
			//    'storage/framework/views',
			//    'storage/logs',
			//]);

			break;
		}
		case 'staging':
		{
			env('branch', 'master');

			// CMS shared file
			set('shared_files', ['staging/.env', 'staging/.env.staging']);

			break;
		}
		case 'testing':
		{
			env('branch', 'master');

			// CMS shared file
			set('shared_files', ['testing/.env', 'testing/.env.testing']);

			break;
		}
	}
})->desc('Initialize project');

task('cms:vendors', function ()
{
	runLocally("cd {{local_release_path}} && {{env_vars}} {{bin/composer}} {{composer_options}}", 360);
//	runLocally("cd {{local_release_path}} && cd resources/themes/adminlte/assets && bower install && cd -", 360);
//	runLocally("cd {{local_release_path}} && cd resources/themes/lumen/assets && bower install && cd -", 360);
	runLocally("cd {{local_release_path}} && php artisan cms:module:publish", 360);
	runLocally("cd {{local_release_path}} && php artisan cms:module:publish-migration", 360);
	runLocally("cd {{local_release_path}} && php artisan cms:theme:publish", 360);
	upload(env('local_release_path'), env('release_path'));
})->desc('Deploy your project');

task('cms:shared', function ()
{
	$remoteSharedPath = '{{deploy_path}}/shared';
	$localSharedPath = '{{local_deploy_path}}/shared';

	foreach (get('shared_files') as $file)
	{
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
	'cms:initialize',
	'local:prepare',
	'deploy:prepare',
	'local:release',
	'deploy:release',
	'local:update_code',
	'cms:vendors',
	'cms:shared',
	//'deploy:writable',
	'deploy:symlink',
	'cleanup',
	'local:cleanup',
])->desc('Deploy your project');
