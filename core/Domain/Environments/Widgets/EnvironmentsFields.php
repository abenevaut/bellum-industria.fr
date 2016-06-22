<?php namespace Core\Domain\Environments\Widgets;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use CVEPDB\Contracts\Widgets;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use Core\Domain\Widgets\AbstractWidgets;

/**
 * Class EnvironmentsFields
 * @package Modules\Users\Widgets
 */
class EnvironmentsFields extends AbstractWidgets implements Widgets
{

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
