<?php namespace cms\App\Listeners;

use Illuminate\Support\Facades\File;
use cms\Domain\Environments\Environments\Events\EnvironmentCreatedEvent;
use cms\Domain\Environments\Environments\Events\EnvironmentDeletedEvent;
use cms\Domain\Files\Repositories\ElFinderDiskRepository;
use cms\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use cms\Domain\Roles\Repositories\RoleRepositoryEloquent;
use cms\Domain\Roles\Repositories\PermissionRepositoryEloquent;

/**
 * Class EnvironmentEventListener
 * @package Core\Domain\Files\Listeners
 */
class EnvironmentEventsListener
{

	/**
	 * @var ElFinderDiskRepository|null
	 */
	private $r_disk = null;

	/**
	 * EnvironmentEventListener constructor.
	 *
	 * @param ElFinderDiskRepository $r_disk
	 */
	public function __construct(ElFinderDiskRepository $r_disk)
	{
		$this->r_disk = $r_disk;
	}

	/**
	 * Register the listeners for the subscriber.
	 *
	 * @param  Illuminate\Events\Dispatcher $events
	 */
	public function subscribe($events)
	{
		$events->listen(
			'Core\Domain\Environments\Events\EnvironmentCreatedEvent',
			'Core\Domain\Files\Listeners\EnvironmentEventListener@environmentCreatedEvent'
		);
		$events->listen(
			'Core\Domain\Environments\Events\EnvironmentDeletedEvent',
			'Core\Domain\Files\Listeners\EnvironmentEventListener@environmentDeletedEvent'
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
		/**
		 * Set all environment disks in readonly on the default environment
		 */

		$env_disks = $this->r_disk->getElFinderDisks($event->environment->reference);
		$default_disks = $this->r_disk->getElFinderDisks(EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE);

		foreach ($env_disks as $disk_key => $options)
		{
			$options['access']['readonly'] = true;

			if (array_key_exists($disk_key, $default_disks))
			{
				$this->r_disk->unmountElFinderDisk(
					$disk_key,
					EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
				);
				$this->r_disk->mountElFinderDisk(
					$disk_key,
					$options,
					EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
				);
			}

		}
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

		$disk_key = $event->environment->reference . '_uploads';

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

		$this->r_disk->setDefaultFileSystemDisk(
			$disk_key,
			$event->environment->reference
		);
		$this->r_disk->addFileSystemDisk(
			$disk_key,
			[
				'driver'     => 'local',
				'root'       => $env_uploads_directory,
				'visibility' => 'public',
			],
			$event->environment->reference
		);
		$this->r_disk->mountElFinderDisk(
			$disk_key,
			[
				'alias'  => $event->environment->name . ' uploads',
				'URL'    => null,
			],
			$event->environment->reference
		);

		/**
		 * Attach new environment uploads directory to the default env
		 */

		if ($event->environment->reference !== EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE)
		{
			$this->r_disk->addFileSystemDisk(
				$disk_key,
				[
					'driver'     => 'local',
					'root'       => $env_uploads_directory,
					'visibility' => 'public',
				],
				EnvironmentRepositoryEloquent::DEFAULT_ENVIRONMENT_REFERENCE
			);
			$this->r_disk->mountElFinderDisk(
				$disk_key,
				[
					'alias'  => $event->environment->name . ' uploads',
					'URL'    => null,
					'access' => [
						'roles'       => [
							RoleRepositoryEloquent::ADMIN
						],
						'permissions' => [
							PermissionRepositoryEloquent::SEE_ENVIRONMENT
						]
					]
				]
			);
		}

	}
}