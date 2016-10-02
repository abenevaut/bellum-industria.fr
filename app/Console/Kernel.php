<?php

namespace cms\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

	/**
	 * The Artisan commands provided by your application.
	 *
	 * @var array
	 */
	protected $commands = [
		\cms\Console\Commands\BindingsCommand::class,
		\cms\Console\Commands\ControllerCommand::class,
		\cms\Console\Commands\EntityCommand::class,
		\cms\Console\Commands\KeyGenerateCommand::class,
		\cms\Console\Commands\PresenterCommand::class,
		\cms\Console\Commands\RepositoryCommand::class,
		\cms\Console\Commands\TransformerCommand::class,
		\cms\Console\Commands\ValidatorCommand::class,
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
		 * Flush expired password reset tokens
		 */

		$schedule
			->command('auth:clear-resets')
			->name('Flush expired password reset tokens')
			->withoutOverlapping()
			->sendOutputTo(storage_path('logs/cron_auth_clear-resets_' . date('Y-m-d_H-i') . '.log'))
			->daily()
			->at('23:59');

		/*
		 * Automated backups
		 */

		$schedule
			->command('backup:clean')
			->name('[Backups] : clean')
			->withoutOverlapping()
			->sendOutputTo(storage_path('logs/cron_backups_clean_' . date('Y-m-d_H-i') . '.log'))
			->daily()
			->at('00:00');

		$schedule
			->command('backup:run')
			->name('[Backups] : run backup')
			->withoutOverlapping()
			->sendOutputTo(storage_path('logs/cron_backups_run_' . date('Y-m-d_H-i') . '.log'))
			->daily()
			->at('00:30');

		/*
		 * Queue
		 */

		$schedule
			->command('queue:work')
			->name('[Queue] : run default queue')
			->withoutOverlapping()
			//->sendOutputTo(storage_path('logs/cron_queue_' . date('Y-m-d_H-i') . '.log'))
			->everyMinute();

	}

}
