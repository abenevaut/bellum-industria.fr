<?php namespace Core\Domain\Environments\Widgets;

use Core\Domain\Environments\Facades\EnvironmentFacade;
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

	/**
	 * @param string $name
	 * @param array  $attributes
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
	 */
	public function register($name = 'environments[]', $attributes = [])
	{
		$envs = $this->r_environment
			->lists('domain', 'id')
			->toArray();

		foreach ($envs as $id => $env)
		{
			$envs[$id] = trans($env);
		}

		if (array_key_exists('all', $attributes) && $attributes['all'])
		{
			$envs = [0 => trans('global.all')] + $envs;
		}

		$value = array_key_exists('value', $attributes) ? $attributes['value'] : '';

		if (array_key_exists('default', $attributes) && $attributes['default'])
		{
			$value = empty($value) ? [EnvironmentFacade::currentId()] : $value;
		}

		return $this->output(
			'core.widgets.environmentsfields',
			[
				'environments' => $envs,
				'default_env'  => EnvironmentFacade::currentId(),
				'name'         => $name,
				'value'        => $value,
				'old_value'    => preg_replace("/[^A-Za-z0-9 ]/", '', $name),
				'placeholder'  => array_key_exists('placeholder', $attributes) ? trans($attributes['placeholder']) : '',
				'class'        => array_key_exists('class', $attributes) ? $attributes['class'] : ''
			]
		);
	}
}
