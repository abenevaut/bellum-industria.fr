<?php namespace cms\Domain\Dashboard\Settings\Repositories;

use Illuminate\Support\Collection;

/**
 * Class SettingsRepository
 * @package cms\Domain\Dashboard\Settings\Repositories
 */
class SettingsRepository
{

	const DASHBOARD_WIDGET_STATUS_ACTIVE = 'active';
	const DASHBOARD_WIDGET_STATUS_INACTIVE = 'disabled';

	/**
	 * @var string
	 */
	protected $setting_key = 'dashboard.widgets';

	/**
	 * @var string
	 */
	protected $module_setting_key = '.admin.dashboard.widgets';

	/**
	 * @param $setting_key
	 */
	public function setSettingKey($setting_key)
	{
		$this->setting_key = $setting_key;
	}

	/**
	 * @param $module_setting_key
	 */
	public function setModuleSettingKey($module_setting_key)
	{
		$this->module_setting_key = $module_setting_key;
	}

	/**
	 * Get active dashboard widgets list
	 *
	 * @return mixed
	 */
	public function allWidgets()
	{
		return \Settings::get($this->setting_key);
	}

	/**
	 * Get active dashboard widgets list
	 *
	 * @return mixed
	 */
	public function activeWidgets()
	{
		$widgets = [];
		$widgets_collection = \Settings::get($this->setting_key);

		if (!is_null($widgets_collection))
		{
			$widgets = $widgets_collection->where(
				'status',
				self::DASHBOARD_WIDGET_STATUS_ACTIVE
			);
		}

		return $widgets;
	}

	/**
	 * Get inactive dashboard widgets list
	 *
	 * @return mixed
	 */
	public function inactiveWidgets()
	{
		$widgets = [];
		$widgets_collection = \Settings::get($this->setting_key);

		if (!is_null($widgets_collection))
		{
			$widgets = $widgets_collection->where(
				'status',
				self::DASHBOARD_WIDGET_STATUS_INACTIVE
			);
		}

		return $widgets;
	}

	/**
	 * Activate a list of widgets (widgets names list)
	 *
	 * @param array $widgets
	 */
	public function activate($widgets = [])
	{
		if (is_null($widgets))
		{
			$widgets = [];
		}

		$widgets_collection = \Settings::get($this->setting_key);
		if (!is_null($widgets_collection))
		{

			$widgets_collection = $widgets_collection
				->map(function ($item, $key) use ($widgets)
				{
					if (in_array($item['name'], $widgets))
					{
						$item['status'] = self::DASHBOARD_WIDGET_STATUS_ACTIVE;
					}
					else
					{
						$item['status']
							= self::DASHBOARD_WIDGET_STATUS_INACTIVE;
					}

					return $item;
				});

			\Settings::set($this->setting_key, $widgets_collection);
		}
	}

	/**
	 * Check if all available dashboard widgets are recorded.
	 *
	 * For each modules, get the widgets list and do following :
	 * - if new, add to DB
	 * - if already exists, do nothing
	 * - if recorded widgets could not be found, delete it
	 */
	public function checkWidgetsList()
	{
		/*
		 * Current available widgets list
		 */

		$widgets_collection = \Settings::get($this->setting_key);
		if (is_null($widgets_collection))
		{
			$widgets_collection = new Collection;
		}

		// List used to remove widget
		$listed_widgets = [];

		foreach (\Module::getOrdered() as $module)
		{

			$module_name = $module->name;
			$module_widgets_list = config(
				strtolower($module_name) . $this->module_setting_key
			);

			/*
			 * Save new widgets
			 */

			if (!empty($module_widgets_list))
			{
				foreach ($module_widgets_list as $widget)
				{

					$is_widget_in_list = $widgets_collection
						->where('name', $widget)
						->count();

					// If widget don't exists in the list, we add it
					if (0 == $is_widget_in_list)
					{
						$widgets_collection->push([
							'name'   => $widget,
							'module' => $module->name,
							'status' => self::DASHBOARD_WIDGET_STATUS_INACTIVE
						]);
					}
					// We record all parsed widget
					$listed_widgets[] = $widget;
				}
			}

			/*
			 * Remove deleted widgets
			 */

			$deleted_widgets = $widgets_collection
				->map(function ($item, $key) use ($listed_widgets, $module_name)
				{
					return !in_array($item['name'], $listed_widgets)
					&& $module_name === $item['module']
						? $key
						: null;
				});

			if ($deleted_widgets->count())
			{
				foreach ($deleted_widgets as $key)
				{
					$widgets_collection->forget($key);
				}
			}
		}

		\Settings::set($this->setting_key, $widgets_collection);
	}
}
