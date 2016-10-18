<?php namespace cms\Domain\Logs\Logs\Traits;

use Exception;
use ReflectionClass;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use cms\Domain\Logs\Logs\Log;

/**
 * Class LogTrait
 * @package cms\Domain\Logs\Logs\Traits
 */
trait LogTrait
{

	/**
	 * Automatically boot with Model, and register Events handler.
	 */
	protected static function bootLogTrait()
	{
		foreach (static::getRecordActivityEvents() as $eventName)
		{
			static::$eventName(
				function (Model $model) use ($eventName) {
				
					try
					{
						$reflect = new ReflectionClass($model);

						return Log::create([
							'user_id'      => Auth::check()
								? Auth::user()->id
								: 0,
							'content_id'   => $model->id,
							'content_type' => get_class($model),
							'action'       => static::getActionName($eventName),
							'description'  => ucfirst($eventName) . " a " . $reflect->getShortName(),
							'details'      => json_encode($model->getDirty())
						]);
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
	protected static function getRecordActivityEvents()
	{
		if (isset(static::$recordEvents))
		{
			return static::$recordEvents;
		}

		return [
			'created',
			'updated',
			'deleted',
		];
	}

	/**
	 * Return Suitable action name for Supplied Event
	 *
	 * @param $event
	 *
	 * @return string
	 */
	protected static function getActionName($event)
	{
		switch (strtolower($event))
		{
			case 'created':
				return 'create';
				break;
			case 'updated':
				return 'update';
				break;
			case 'deleted':
				return 'delete';
				break;
			default:
				return 'unknown';
		}
	}
}
