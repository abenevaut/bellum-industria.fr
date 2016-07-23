<?php namespace cms\App\Facades;

use cms\Infrastructure\Abstractions\FacadeAbstract;

/**
 * Class Environments
 * @package cms\App\Facades
 */
class Environments extends FacadeAbstract
{

	protected static function getFacadeAccessor()
	{
		return 'environment';
	}

}
