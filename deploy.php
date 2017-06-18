<?php

require 'recipe/common.php';
require 'recipe/laravel.php';

\Deployer\inventory('deploy.yml');
\Deployer\set('keep_releases', 5);
\Deployer\set('repository', 'git@gitlab.com:bellum-industria/www.git');
\Deployer\set('branch', 'master');
\Deployer\set('writable_use_sudo', true);

// Laravel shared dirs
\Deployer\set('shared_dirs', [
	'storage',
]);

// Laravel shared file
\Deployer\set('shared_files', [
	'.env',
]);

// Laravel writable dirs
\Deployer\set('writable_dirs', [
	'bootstrap/cache',
	'storage',
	'storage/app',
	'storage/app/public',
	'storage/framework',
	'storage/framework/cache',
	'storage/framework/sessions',
	'storage/framework/views',
	'storage/logs',
]);

\Deployer\task('bellumindustriafr:docker:build', function() {
	\Deployer\run("docker-compose --project-name bellumindustria -f {{current_path}}/docker-compose.yml build apache2 php-fpm php-worker mysql redis");
});

\Deployer\task('bellumindustriafr:docker:start', function() {
	\Deployer\run("docker-compose --project-name bellumindustria -f {{current_path}}/docker-compose.yml up -d apache2 php-fpm php-worker mysql redis");
});

\Deployer\task('bellumindustriafr:docker:composer-install', function() {
	\Deployer\run("docker-compose --project-name bellumindustria -f {{current_path}}/docker-compose.yml exec -T workspace composer install");
});

\Deployer\task('bellumindustriafr:docker:artisan-optimize', function() {
	\Deployer\run("docker-compose --project-name bellumindustria -f {{current_path}}/docker-compose.yml exec -T workspace php /var/www/artisan optimize");
	\Deployer\run("docker-compose --project-name bellumindustria -f {{current_path}}/docker-compose.yml exec -T workspace php /var/www/artisan route:cache");
	\Deployer\run("docker-compose --project-name bellumindustria -f {{current_path}}/docker-compose.yml exec -T workspace php /var/www/artisan config:cache");
});

\Deployer\task('bellumindustriafr:docker:artisan-migrate', function() {
	\Deployer\run("docker-compose --project-name bellumindustria -f {{current_path}}/docker-compose.yml exec -T workspace php /var/www/artisan migrate");
});

/**
 * Serverfiles deployement
 */
\Deployer\task('deploy', [
	'deploy:prepare',
	'deploy:lock',
	'deploy:release',
	'deploy:update_code',
	'deploy:shared',
	// 'deploy:vendors',
	'deploy:writable',
//	'artisan:storage:link',
//	'artisan:view:clear',
//	'artisan:cache:clear',
//	'artisan:config:cache',
//	'artisan:optimize',
	'deploy:clear_paths',
	'deploy:symlink',
	'bellumindustriafr:docker:build',
	'bellumindustriafr:docker:start',
	'bellumindustriafr:docker:composer-install',
	'bellumindustriafr:docker:artisan-optimize',
	'bellumindustriafr:docker:artisan-migrate',
	'deploy:unlock',
	'cleanup',
	'success'
])->desc('Deploy www.bellum-industria.fr on server');
