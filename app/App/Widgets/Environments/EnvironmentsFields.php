<?php namespace cms\App\Widgets\Environments;

use cms\App\Facades\Environments;
use cms\Infrastructure\Abstractions\Widgets\WidgetsAbstract;
use cms\Domain\Settings\Settings\Repositories\SettingsRepository;
use cms\Domain\Environments\Environments\Repositories\EnvironmentsRepositoryEloquent;

/**
 * Class EnvironmentsFields
 * @package Modules\Users\Widgets
 */
class EnvironmentsFields extends WidgetsAbstract
{

	/**
	 * @var SettingsRepository|null
	 */
	private $r_settings = null;

	/**
	 * @var EnvironmentsRepositoryEloquent|null
	 */
	private $r_environments = null;

	public function __construct(SettingsRepository $r_settings, EnvironmentsRepositoryEloquent $r_environments)
	{
		$this->r_settings = $r_settings;
		$this->r_environments = $r_environments;
	}

	/**
	 * @param string $name
	 * @param array  $attributes
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|mixed
	 */
	public function register($name = 'environments[]', $attributes = [])
	{
		$envs = $this->r_environments
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
			$value = empty($value) ? [Environments::currentId()] : $value;
		}

		return $this->output(
			'core.widgets.environmentsfields',
			[
				'environments' => $envs,
				'default_env'  => Environments::currentId(),
				'name'         => $name,
				'value'        => $value,
				'old_value'    => preg_replace("/[^A-Za-z0-9 ]/", '', $name),
				'placeholder'  => array_key_exists('placeholder', $attributes) ? trans($attributes['placeholder']) : '',
				'class'        => array_key_exists('class', $attributes) ? $attributes['class'] : ''
			]
		);
	}
}
