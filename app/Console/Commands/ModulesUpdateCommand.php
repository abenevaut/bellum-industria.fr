<?php namespace cms\Console\Commands;

use Pingpong\Modules\Traits\ModuleCommandTrait;
use Symfony\Component\Console\Input\InputArgument;
use cms\Infrastructure\Abstractions\Console\CommandAbstract;

/**
 * Class ModulesUpdateCommand
 * @package cms\Console\Commands
 */
class ModulesUpdateCommand extends CommandAbstract
{

	use ModuleCommandTrait;

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cms:module:update';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Update dependencies for the specified module or for all modules.';

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		parent::fire();

		$this->laravel['modules']->update($name = $this->getModuleName());

		$this->info("Module [{$name}] updated successfully.");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('module', InputArgument::OPTIONAL, 'The name of module will be updated.'),
		);
	}

}
