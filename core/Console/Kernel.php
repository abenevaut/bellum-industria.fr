<?php namespace Core\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;

/**
 * Class Kernel
 * @package Core\Console
 */
class Kernel extends ConsoleKernel
{

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		\Core\Console\Commands\BindingsCommand::class,
		\Core\Console\Commands\ControllerCommand::class,
		\Core\Console\Commands\EntityCommand::class,
		\Core\Console\Commands\KeyGenerateCommand::class,
		\Core\Console\Commands\PresenterCommand::class,
		\Core\Console\Commands\RepositoryCommand::class,
		\Core\Console\Commands\TransformerCommand::class,
		\Core\Console\Commands\ValidatorCommand::class,
	];

	/**
	 * Define the application's command schedule.
	 *
	 * @param  \Illuminate\Console\Scheduling\Schedule $schedule
	 *
	 * @return void
	 */
	protected function schedule(Schedule $schedule)
	{
		/*
		 * Automated backups
		 */

		$schedule->command('backup:clean')
			->name('[Backups] : clean')
			->withoutOverlapping()
			->sendOutputTo(storage_path('logs/cron_backups_clean_' . date('Y-m-d_H-i') . '.log'))
			->daily()
			->at('00:00');

		$schedule->command('backup:run')
			->name('[Backups] : run backup')
			->withoutOverlapping()
			->sendOutputTo(storage_path('logs/cron_backups_run_' . date('Y-m-d_H-i') . '.log'))
			->daily()
			->at('00:30');

		/*
		 * Queue
		 */

		$schedule->call(
			function ()
			{
				Artisan::call('queue:listen', array('--queue' => 'default'));
			}
		)
			->name('[Queue] : run default queue')
			->withoutOverlapping()
			->everyMinute();

	}
}
