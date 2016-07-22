<?php namespace cms\Core\Domain\Roles\Roles\Widgets;

use Core\Domain\Environments\Facades\EnvironmentFacade;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use cms\Core\Domain\Roles\Permissions\Repositories\PermissionsRepositoryEloquent;
use Illuminate\Support\Facades\Auth;
use Widget;
use CVEPDB\Contracts\Widgets;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Modules\Users\Repositories\RoleRepositoryEloquent;
use Core\Domain\Widgets\AbstractWidgets;

/**
 * Class RolesFields
 * @package cms\Core\Domain\Roles\Roles\Widgets
 */
class RolesFields extends AbstractWidgets implements Widgets
{

	/**
	 * @var string Widget title
	 */
	protected $title = 'Roles field';

	/**
	 * @var string Widget description
	 */
	protected $description = 'Display roles input field';

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
	 * @var RoleRepositoryEloquent|null
	 */
	private $r_role = null;

	public function __construct(SettingsRepository $r_settings, RoleRepositoryEloquent $r_role)
	{
		$this->r_settings = $r_settings;
		$this->r_role = $r_role;
	}
	
	public function register($name = 'roles[]', $attributes = [])
	{
		$user_can_see_environment = cmsuser_can_see_env();

		if (!$user_can_see_environment)
		{
			$this->r_role->filterEnvironments([EnvironmentFacade::currentId()]);
		}
		$roles = $this->r_role->all(['roles.display_name', 'roles.id']);

		$roles_list = [];
		foreach ($roles as $role)
		{
			$roles_list[$role->id] = trans($role->display_name);
		}

		if (array_key_exists('all', $attributes) && $attributes['all'])
		{
			$roles_list = [0 => trans('global.all')] + $roles_list;
		}

		return $this->output(
			'core.widgets.rolesfields',
			[
				'roles'       => $roles_list,
				'name'        => $name,
				'value'       => array_key_exists('value', $attributes) ? $attributes['value'] : '',
				'old_value'   => preg_replace("/[^A-Za-z0-9 ]/", '', $name),
				'placeholder' => array_key_exists('placeholder', $attributes) ? trans($attributes['placeholder']) : '',
				'class'       => array_key_exists('class', $attributes) ? $attributes['class'] : ''
			]
		);
	}
}
