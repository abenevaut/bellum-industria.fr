<?php namespace Core\Domain\Environments\Listeners;

use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Illuminate\Support\Facades\File;
use CVEPDB\Settings\Facades\Settings;
use Core\Domain\Environments\Events\EnvironmentCreatedEvent;
use Core\Domain\Environments\Events\EnvironmentDeletedEvent;

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
		$events->listen(
			'Core\Domain\Environments\Events\EnvironmentDeletedEvent',
			'Core\Domain\Environments\Listeners\EnvironmentEventListener@environmentDeletedEvent'
		);
	}

	/**
	 * Handle EnvironmentCreatedEvent events.
	 *
	 * Set directories access for default and new environment.
	 *
	 * @param EnvironmentCreatedEvent $event
	 */
	public function environmentDeletedEvent(EnvironmentDeletedEvent $event)
	{

		/*
		 * Detach environment uploads directory to the env. settings
		 */

		Settings::forget('filesystems.default', $event->environment->reference);
		Settings::forget('filesystems.disks', $event->environment->reference);
		Settings::forget('elfinder.dir', $event->environment->reference);

		/**
		 * Detach environment uploads directory to the default env. settings
		 */

		$disk_key = $event->environment->reference . '_uploads';

		$disks = Settings::get(
			'filesystems.disks',
			EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
		);
		unset($disks[$disk_key]);
		Settings::set(
			'filesystems.disks',
			$disks,
			EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
		);

		$disks = Settings::get(
			'elfinder.disks',
			EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
		);
		unset($disks[$disk_key]);
		Settings::set(
			'elfinder.disks',
			$disks,
			EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
		);
	}

	/**
	 * Handle EnvironmentCreatedEvent events.
	 *
	 * Set directories access for default and new environment.
	 *
	 * @param EnvironmentCreatedEvent $event
	 */
	public function environmentCreatedEvent(EnvironmentCreatedEvent $event)
	{

		$env_uploads_directory = public_path(
			'uploads/' . $event->environment->reference . '/uploads'
		);

		/*
		 * Create environment uploads directory
		 */

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

		$disk_key = $event->environment->reference . '_uploads';

		Settings::set(
			'filesystems.disks',
			Settings::get('filesystems.disks')
				+ [
				$disk_key => [
						'driver'     => 'local',
						'root'       => $env_uploads_directory,
						'visibility' => 'public',
					],
				],
			EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
		);
		Settings::set(
			'elfinder.disks',
			Settings::get('elfinder.disks')
				+ [
				$disk_key => [
						'alias' => $event->environment->name . ' uploads',
						'URL'   => null,
					],
				],
			EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
		);

	}
}