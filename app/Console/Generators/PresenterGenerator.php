<?php namespace cms\Console\Generators;

use cms\Infrastructure\Abstractions\Console\PrettusGeneratorAbstract;

/**
 * Class PresenterGenerator
 * @package cms\Console\Generators
 */
class PresenterGenerator extends PrettusGeneratorAbstract
{

	/**
	 * Get stub name.
	 *
	 * @var string
	 */
	protected $stub = 'presenter/presenter';

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
			$module_path = 'cms\\Modules\\'
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
		return 'presenters';
	}

	/**
	 * Get array replacements.
	 *
	 * @return array
	 */
	public function getReplacements()
	{
		$transformerGenerator = new TransformerGenerator([
			'name' => $this->name
		]);

		if (
			array_key_exists('module', $this->options)
			&& !empty($this->options['module'])
		)
		{
			$module_namespace = 'cms\\Modules\\'
				. ucfirst(strtolower($this->options['module']));

			$transformer = $module_namespace
				. '\\'
				. $transformerGenerator->getName();
		}
		else
		{
			$transformer = $transformerGenerator->getRootNamespace()
				. '\\'
				. $transformerGenerator->getName()
				. 'Transformer';
		}

		$transformer = str_replace([
			"\\",
			'/'
		], '\\', $transformer);

		return array_merge(parent::getReplacements(), [
			'transformer' => $transformer
		]);
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
			. 'Presenter.php';

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

}
