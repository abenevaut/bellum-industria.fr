<?php namespace cms\Console\Commands;

use File;
use Prettus\Repository\Generators\BindingsGenerator;
use Prettus\Repository\Generators\FileAlreadyExistsException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use cms\Infrastructure\Abstractions\Console\CommandAbstract;

/**
 * Class BindingsCommand
 * @package cms\Console\Commands
 */
class BindingsCommand extends CommandAbstract
{

	/**
	 * The name of command.
	 *
	 * @var string
	 */
	protected $name = 'cms:make:bindings';

	/**
	 * The description of command.
	 *
	 * @var string
	 */
	protected $description = '[NOT WORKING!] Add repository bindings to service provider.';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Bindings';

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function fire()
	{
		parent::fire();

		$this->error('This command is currently not implemented!');
		exit;

		try
		{
			$opts = [
				'name'   => $this->argument('name'),
				'module' => $this->argument('module'),
				'force'  => $this->option('force'),
			];

			$bindingGenerator = new BindingsGenerator($opts);

			// generate repository service provider
			if (!file_exists($bindingGenerator->getPath()))
			{

				// xABE todo : overload make:provider to work with modules.

				$this->call(
					'make:provider',
					[
						'name' => $bindingGenerator
							->getConfigGeneratorClassPath(
								$bindingGenerator->getPathConfigNode()
							),
					]
				);

				// placeholder to mark the place in file where to prepend repository bindings
				$provider = File::get($bindingGenerator->getPath());

				File::put(
					$bindingGenerator->getPath(),
					vsprintf(
						str_replace('//', '%s', $provider),
						[
							'//',
							$bindingGenerator->bindPlaceholder
						]
					)
				);

				$bindingGenerator->run();
			}

			$this->info($this->type . ' created successfully.');
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
			['name', InputArgument::REQUIRED, 'The name of model for which the controller is being generated.', null],
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
			['force', 'f', InputOption::VALUE_NONE, 'Force the creation if file already exists.', null],
		];
	}

}
