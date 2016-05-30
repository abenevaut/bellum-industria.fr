<?php namespace Core\Domain\Environments\Traits;

use Illuminate\Database\Eloquent\Model;
use Auth;
use ReflectionClass;
use Exception;
use Core\Domain\Environments\Entities\Environment;

/**
 * Automatically attach DB entry to an environment.
 *
 * Class EnvironmentTrait
 * @package Core\Domain\Environments\Traits
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

								$env->users()->attach($model->id);

								break;
							}
						}
					}
					catch (Exception $e)
					{
						return 1;
					}
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

}
