<?php namespace cms\Infrastructure\Abstractions\Console;

use Illuminate\Console\Command;

/**
 * Class CommandAbstract
 * @package cms\Infrastructure\Abstractions\Console
 */
abstract class CommandAbstract extends Command
{

	/**
	 * Write license in console
	 */
	public function fire()
	{
		$this->line("<comment>" . config('cms.licenses.phpcli') . "</comment>\n");
	}

}
