<?php namespace bellumindustria\Console\Commands;

use Illuminate\Console\Command;

class BellumIndustriaProductionPostDeployCommand extends Command
{

	/**
	 * Command name.
	 *
	 * @var string
	 */
	protected $name = 'bellumindustria:production-post-deploy';

	/**
	 * Command signature.
	 *
	 * @var string
	 */
	protected $signature = 'bellumindustria:production-post-deploy';

	/**
	 * Command description.
	 *
	 * @var string
	 */
	protected $description = 'Production post deployment script';

	/**
	 * Execute command.
	 */
	public function handle()
	{
		if (app()->environment('production')) {
			\Artisan::call('config:cache');
			\Artisan::call('route:cache');
			\Artisan::call('view:clear');
			\Artisan::call('cache:clear');
			\Artisan::call('migrate', ['--force' => true]);
			\Artisan::call('up');
			$this->info('bellumindustria:production-post-deploy : success!');
		} else {
			$this->error('You must to be in "production" environment to use this command!');
		}
	}
}
