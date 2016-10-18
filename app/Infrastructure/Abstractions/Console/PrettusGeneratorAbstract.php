<?php namespace cms\Infrastructure\Abstractions\Console;

use Prettus\Repository\Generators\Generator as PrettusGenerators;
use Pingpong\Modules\Facades\Module;

/**
 * Class PrettusGeneratorAbstract
 * @package cms\Infrastructure\Abstractions\Console
 */
abstract class PrettusGeneratorAbstract extends PrettusGenerators
{

	/**
	 * Generator constructor.
	 *
	 * @param array $options
	 */
	public function __construct(array $options = [])
	{
		parent::__construct($options);

		if (
			array_key_exists('module', $this->options)
			&& !empty($this->options['module'])
			&& !Module::has($options['module'])
		)
		{
			throw new \Exception('Module doesn\'t exist!');
		}
	}

}
