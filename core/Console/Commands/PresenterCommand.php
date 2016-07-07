<?php namespace Core\Console\Commands;

use Illuminate\Console\Command;
use Prettus\Repository\Generators\FileAlreadyExistsException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Core\Console\Generators\PresenterGenerator;
use Core\Console\Generators\TransformerGenerator;

/**
 * Class PresenterCommand
 * @package Core\Console\Commands
 */
class PresenterCommand extends Command
{

	/**
	 * The name of command.
	 *
	 * @var string
	 */
	protected $name = 'cms:make:presenter';

	/**
	 * The description of command.
	 *
	 * @var string
	 */
	protected $description = 'Create a new presenter.';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Presenter';

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function fire()
	{
		try
		{
			$opts = [
				'name'   => $this->argument('name'),
				'module' => $this->argument('module'),
				'force'  => $this->option('force'),
			];

			$generator = new PresenterGenerator($opts);
			$generator->run();

			$this->info("Presenter created successfully.");

			if ($this->confirm('Would you like to create a Transformer? [y|N]'))
			{
				$opts = [
					'name'   => $this->argument('name'),
					'module' => $this->argument('module'),
					'force'  => $this->option('force'),
				];

				$this->type = 'Transformer'; // For exception message

				$generator = new TransformerGenerator($opts);
				$generator->run();

				$this->info("Transformer created successfully.");
			}
		}
		catch (FileAlreadyExistsException $e)
		{
			$this->error($this->type . ' already exists!');
		}
		catch (\Exception $e)
		{
			$this->error($e->getMessage());
		}
	}

	/**
	 * The array of command arguments.
	 *
	 * @return array
	 */
	public function getArguments()
	{
		return [
			['name', InputArgument::REQUIRED, 'The name of model for which the presenter is being generated.', null],
			['module', InputArgument::OPTIONAL, 'The module for which the presenter is being generated.', null],
		];
	}

	/**
	 * The array of command options.
	 *
	 * @return array
	 */
	public function getOptions()
	{
		return [
			['force', 'f', InputOption::VALUE_NONE, 'Force the creation if file already exists.', null]
		];
	}

}
