<?php namespace Core\Domain\Environments\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class EnvironmentFacade
 * @package Core\Domain\Environments\Facades
 */
class EnvironmentFacade extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'environment';
	}

}
