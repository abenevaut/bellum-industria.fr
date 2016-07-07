<?php namespace Core\Console\Commands;

use Illuminate\Console\Command;

/**
 * Class CoreCommand
 * @package Core\Console\Commands
 */
abstract class CoreCommand extends Command
{

	/**
	 * Write license in console
	 */
	public function fire()
	{
		$this->line("<comment>" . config('core.licenses.phpcli') . "</comment>\n");
	}

}
