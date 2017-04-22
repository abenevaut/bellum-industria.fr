<?php namespace cms\Console\ScheduledStages;

use League\Pipeline\StageInterface;
use Illuminate\Console\Scheduling\Schedule;

class QueueWorkScheduledStages implements StageInterface
{

	public function __invoke($payload)
	{

		if ($payload instanceof Schedule)
		{
			$payload
				->command('queue:work')
				->name('[CRON] : process queue')
				->withoutOverlapping()
				->everyMinute();
		}

		return $payload;
	}
}
