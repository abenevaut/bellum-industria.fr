<?php namespace Core\Domain\Environments\Listeners;

use Core\Domain\Environments\Events\EnvironmentCreatedEvent;
use CVEPDB\Settings\Facades\Settings;
use Illuminate\Support\Facades\File;

/**
 * Class EnvironmentEventListener
 * @package Core\Domain\Environments\Listeners
 */
class EnvironmentEventListener
{

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  Illuminate\Events\Dispatcher $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			'Core\Domain\Environments\Events\EnvironmentCreatedEvent',
			'Core\Domain\Environments\Listeners\EnvironmentEventListener@environmentCreatedEvent'
		);
	}

	/**
	 * Handle EnvironmentCreatedEvent events.
	 */
	public function environmentCreatedEvent(EnvironmentCreatedEvent $event)
	{
		$env_uploads_directory = public_path(
			'uploads/' . $event->environment->reference . '/uploads'
		);

		if (!File::exists($env_uploads_directory))
		{
			File::makeDirectory(
				public_path(
					'uploads/' . $event->environment->reference
				),
				0777
			);
			File::makeDirectory($env_uploads_directory, 0777);
		}

		/*
		 * Attach new environment uploads directory to the new env
		 */

		Settings::set(
			'filesystems.default',
			'uploads',
			$event->environment->reference
		);

		Settings::set(
			'filesystems.disks',
			[
				'uploads' => [
					'driver'     => 'local',
					'root'       => $env_uploads_directory,
					'visibility' => 'public',
				],
			],
			$event->environment->reference
		);

		Settings::set(
			'elfinder.dir',
			'uploads/' . $event->environment->reference . '/uploads',
			$event->environment->reference
		);

		/**
		 * Attach new environment uploads directory to the default env
		 */

		Settings::set(
			'elfinder.disks',
			[

				'backups' => [
					'alias' => 'Backups',
					'URL'   => null,
				],

			]
		);

		Settings::set(
			'filesystems.disks',
			Settings::get('filesystems.disks') + [
				$env_uploads_directory . '_uploads' => [
					'driver'     => 'local',
					'root'       => $env_uploads_directory,
					'visibility' => 'public',
					'Alias'      => $env_uploads_directory . ' uploads'
				],
			]
		);

	}
}