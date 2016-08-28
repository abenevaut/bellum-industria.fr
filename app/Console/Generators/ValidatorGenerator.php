<?php namespace cms\Console\Generators;

use Prettus\Repository\Generators\Migrations\RulesParser;
use Prettus\Repository\Generators\Migrations\SchemaParser;
use cms\Infrastructure\Abstractions\Console\PrettusGeneratorAbstract;

/**
 * Class ValidatorGenerator
 * @package cms\Console\Generators
 */
class ValidatorGenerator extends PrettusGeneratorAbstract
{

	/**
	 * Get stub name.
	 *
	 * @var string
	 */
	protected $stub = 'validator/validator';

	/**
	 * Get root namespace.
	 *
	 * @return string
	 */
	public function getRootNamespace()
	{

		$namespace_directory = parent::getConfigGeneratorClassPath(
			$this->getPathConfigNode()
		);

		if (
			array_key_exists('module', $this->options)
			&& !empty($this->options['module'])
		)
		{
			$module_path = 'Modules\\'
				. ucfirst(strtolower($this->options['module']))
				. '\\';

			return $module_path . $namespace_directory;
		}

		return parent::getRootNamespace() . $namespace_directory;
	}

	/**
	 * Get generator path config node.
	 *
	 * @return string
	 */
	public function getPathConfigNode()
	{
		return 'validators';
	}

	/**
	 * Get destination path for generated file.
	 *
	 * @return string
	 */
	public function getPath()
	{

		$file_path = '/'
			. parent::getConfigGeneratorClassPath(
				$this->getPathConfigNode(),
				true
			)
			. '/'
			. $this->getName()
			. 'Validator.php';

		if (
			array_key_exists('module', $this->options)
			&& !empty($this->options['module'])
		)
		{
			$module_path = 'modules/'
				. ucfirst(strtolower($this->options['module']));

			return $module_path . $file_path;
		}

		return $this->getBasePath() . $file_path;
	}

	/**
	 * Get base path of destination file.
	 *
	 * @return string
	 */
	public function getBasePath()
	{
		return config('repository.generator.basePath', app_path());
	}

	/**
	 * Get array replacements.
	 *
	 * @return array
	 */
	public function getReplacements()
	{
		return array_merge(
			parent::getReplacements(),
			[
				'rules' => $this->getRules(),
			]
		);
	}

	/**
	 * Get the rules.
	 *
	 * @return string
	 */
	public function getRules()
	{
		if (!$this->rules)
		{
			return '[]';
		}
		$results = '[' . PHP_EOL;

		foreach ($this->getSchemaParser()->toArray() as $column => $value)
		{
			$results .= "\t\t'{$column}'\t=>'\t{$value}'," . PHP_EOL;
		}

		return $results . "\t" . ']';
	}

	/**
	 * Get schema parser.
	 *
	 * @return SchemaParser
	 */
	public function getSchemaParser()
	{
		return new RulesParser($this->rules);
	}
}
