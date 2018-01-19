<?php namespace abenevaut\Console\Commands;

use Illuminate\Console\Command;

class BellumIndustriaProductionPreDeployCommand extends Command
{

	/**
	 * Command name.
	 *
	 * @var string
	 */
	protected $name = 'bellumindustria:production-pre-deploy';

	/**
	 * Command signature.
	 *
	 * @var string
	 */
	protected $signature = 'bellumindustria:production-pre-deploy';

	/**
	 * Command description.
	 *
	 * @var string
	 */
	protected $description = 'Production pre deployment script';

	/**
	 * Execute command.
	 */
	public function handle()
	{
		if (app()->environment('production')) {
			\Artisan::call('down');
			\Artisan::call('backup:run', [
				'--only-db' => true,
				'--filename' => config('versiongenerated.version') . '-' . date('Y-m-d_H-i-s') . '.zip',
			]);
			$this->info('bellumindustria:production-pre-deploy : success!');
		} else {
			$this->error('You must to be in "production" environment to use this command!');
		}
	}
}
