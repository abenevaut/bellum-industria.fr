<?php namespace Core\Console\Generators;

use Prettus\Repository\Generators\ModelGenerator;

/**
 * Class TransformerGenerator
 * @package Core\Console\Commands\Generators
 */
class TransformerGenerator extends Generator
{

	/**
	 * Get stub name.
	 *
	 * @var string
	 */
	protected $stub = 'transformer/transformer';

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
		return 'transformers';
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
			. '/' . $this->getName() . 'Transformer.php';

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
		$modelGenerator = new ModelGenerator([
			'name' => $this->name
		]);

		if (
			array_key_exists('module', $this->options)
			&& !empty($this->options['module'])
		)
		{
			$module_namespace = 'Modules\\'
				. ucfirst(strtolower($this->options['module']));

			$model = $module_namespace . '\\' . $modelGenerator->getName();
		}
		else
		{
			$model = $modelGenerator->getRootNamespace()
				. '\\'
				. $modelGenerator->getName();
		}

		$model = str_replace([
			"\\",
			'/'
		], '\\', $model);

		return array_merge(parent::getReplacements(), ['model' => $model]);
	}

}
