<?php namespace cms\Domain\Environments\Environments\Traits;

use Illuminate\Database\Eloquent\Model;
use cms\Domain\Environments\Environments\Environment;

/**
 * Class EnvironmentTrait
 * @package cms\Domain\Environments\Environments\Traits
 */
trait EnvironmentTrait
{

	/**
	 * Automatically boot with Model, and register Events handler.
	 */
	protected static function bootEnvironmentTrait()
	{
		foreach (static::setEnvironmentEvents() as $eventName)
		{
			static::$eventName(
				function (Model $model) use ($eventName)
				{

					try
					{
						switch (strtolower($eventName))
						{
							case 'created':
							{

								$env = Environment::where('domain', $_SERVER['HTTP_HOST'])
									->firstOrFail();

								$env->{static::getBelongsToManyEnvironmentName()}()->attach($model->id);

								break;
							}
						}
					}
					catch (\Exception $e)
					{
						return 1;
					}

					return 0;
				}
			);
		}
	}

	/**
	 * Set the default events to be recorded if the $recordEvents
	 * property does not exist on the model.
	 *
	 * @return array
	 */
	protected static function setEnvironmentEvents()
	{
		return [
			'created',
		];
	}

	/**
	 * Get the default "belongsToMany" link name, present in Environment model.
	 *
	 * @return string
	 */
	protected static function getBelongsToManyEnvironmentName()
	{
		return 'users';
	}
}
