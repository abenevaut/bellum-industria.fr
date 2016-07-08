<?php namespace Core\Console\Generators;

use Prettus\Repository\Generators\Generator as PrettusGenerators;
use Pingpong\Modules\Facades\Module;

/**
 * Class Generator
 * @package Core\Console\Generators
 */
abstract class Generator extends PrettusGenerators
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
