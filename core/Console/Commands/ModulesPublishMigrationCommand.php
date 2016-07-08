<?php namespace Core\Console\Commands;

use Pingpong\Modules\Publishing\MigrationPublisher;
use Symfony\Component\Console\Input\InputArgument;

/**
 * Class ModulesPublishMigrationCommand
 * @package Core\Console\Commands
 */
class ModulesPublishMigrationCommand extends CoreCommand
{

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'cms:module:publish-migration';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = "Publish a module's migrations to the application";

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
		parent::fire();

		if ($name = $this->argument('module'))
		{
			$module = $this->laravel['modules']->findOrFail($name);

			$this->publish($module);

			return;
		}

		foreach ($this->laravel['modules']->enabled() as $module)
		{
			$this->publish($module);
		}
	}

	/**
	 * Publish migration for the specified module.
	 *
	 * @param \Pingpong\Modules\Module $module
	 */
	public function publish($module)
	{
		with(new MigrationPublisher($module))
			->setRepository($this->laravel['modules'])
			->setConsole($this)
			->publish();
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			array('module', InputArgument::OPTIONAL, 'The name of module being used.'),
		);
	}

}
