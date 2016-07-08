<?php namespace Core\Console\Commands;

use Prettus\Repository\Generators\ControllerGenerator;
use Prettus\Repository\Generators\FileAlreadyExistsException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;

/**
 * Class ControllerCommand
 * @package Core\Console\Commands
 */
class ControllerCommand extends CoreCommand
{

	/**
	 * The name of command.
	 *
	 * @var string
	 */
	protected $name = 'cms:make:controller';

	/**
	 * The description of command.
	 *
	 * @var string
	 */
	protected $description = '[NOT WORKING!] Create a new RESTfull controller.';

	/**
	 * The type of class being generated.
	 *
	 * @var string
	 */
	protected $type = 'Controller';

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
			// Generate create request for controller
			$this->call(
				'make:request',
				[
					'name' => $this->argument('name') . 'Request'
				]
			);

			$opts = [
				'name'  => $this->argument('name'),
				'force' => $this->option('force'),
			];

			$controllerGenerator = new ControllerGenerator($opts);
			$controllerGenerator->run();

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
