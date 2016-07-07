<?php namespace Core\Console\Commands;

use Illuminate\Console\Command;
use Prettus\Repository\Generators\FileAlreadyExistsException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Core\Console\Generators\TransformerGenerator;

/**
 * Class TransformerCommand
 * @package Core\Console\Commands
 */
class TransformerCommand extends Command
{

	/**
	 * The name of command.
	 *
	 * @var string
	 */
	protected $name = 'cms:make:transformer';

	/**
	 * The description of command.
	 *
	 * @var string
	 */
	protected $description = 'Create a new transformer.';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Transformer';

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

			$generator = new TransformerGenerator($opts);
			$generator->run();

			$this->info("Transformer created successfully.");
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
			['name', InputArgument::REQUIRED, 'The name of model for which the transformer is being generated.', null],
			['module', InputArgument::OPTIONAL, 'The module for which the transformer is being generated.', null],
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
