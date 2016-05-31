<?php namespace Core\Domain\Environments\Widgets;

use CVEPDB\Contracts\Widgets;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;

/**
 * Class EnvironmentsFields
 * @package Modules\Users\Widgets
 */
class EnvironmentsFields implements Widgets
{

	/**
	 * @var string Widget title
	 */
	protected $title = 'Environments field';

	/**
	 * @var string Widget description
	 */
	protected $description = 'Display environments input field';

	/**
	 * @var string View namespace ('dashboard::'|null)
	 */
	protected $view_prefix = '';

	/**
	 * @var string
	 */
	protected $module = '';

	/**
	 * @var SettingsRepository|null
	 */
	private $r_settings = null;

	/**
	 * @var EnvironmentRepositoryEloquent|null
	 */
	private $r_environment = null;

	public function __construct(SettingsRepository $r_settings, EnvironmentRepositoryEloquent $r_environment)
	{
		$this->r_settings = $r_settings;
		$this->r_environment = $r_environment;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitlte()
	{
		return $this->title;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setModuleName($module_name)
	{
		$this->module = $module_name . '::';
	}

	public function getModuleName()
	{
		return $this->module;
	}

	public function output($view, $data = [])
	{
		return cmsview($view, $data, $this->view_prefix, $this->module);
	}

	public function widgetInformation()
	{
		return [
			'title'       => $this->getTitlte(),
			'description' => $this->getDescription(),
		];
	}

	public function register($name = 'environments[]', $attributes = [])
	{
		$envs = $this->r_environment->lists('domain', 'id');

		foreach ($envs as $id => $env)
		{
			$envs[$id] = trans($env);
		}

		return $this->output(
			'core.widgets.environmentsfields',
			[
				'roles'       => $envs,
				'name'        => $name,
				'value'       => array_key_exists('value', $attributes) ? $attributes['value'] : '',
				'old_value'   => preg_replace("/[^A-Za-z0-9 ]/", '', $name),
				'placeholder' => array_key_exists('placeholder', $attributes) ? trans($attributes['placeholder']) : '',
				'class'       => array_key_exists('class', $attributes) ? $attributes['class'] : ''
			]
		);
	}
}
