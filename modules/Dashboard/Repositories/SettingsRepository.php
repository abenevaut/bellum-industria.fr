<?php namespace Modules\Dashboard\Repositories;

use Core\Domain\Settings\Repositories\SettingsRepository as BaseSettingsRepository;
use Illuminate\Support\Collection;

/**
 * Class Settings
 * @package Core\Domain\Settings\Repositories
 */
class SettingsRepository extends BaseSettingsRepository
{
    const DASHBOARD_WIDGET_STATUS_ACTIVE = 'active';
    const DASHBOARD_WIDGET_STATUS_INACTIVE = 'disabled';

    /**
     * Get active dashboard widgets list
     *
     * @return mixed
     */
    public function activeWidgets()
    {
        $widgets = [];
        $widgets_collection = $this->get('dashboard.widgets');
        if (!is_null($widgets_collection)) {
            $widgets = $widgets_collection->where('status', self::DASHBOARD_WIDGET_STATUS_ACTIVE);
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
        $widgets_collection = $this->get('dashboard.widgets');
        if (!is_null($widgets_collection)) {
            $widgets = $widgets_collection->where('status', self::DASHBOARD_WIDGET_STATUS_INACTIVE);
        }
        return $widgets;
    }

    /**
     * @param $status
     * @param $id
     */
    public function update($status, $id)
    {
        $widgets_collection = $this->get('dashboard.widgets');
        if (!is_null($widgets_collection)) {

            $widget_key = $widgets_collection->map(function ($item, $key) use ($id) {
                return $item['name'] === $id ? $key : null;
            });

            $current_widget = $widgets_collection->get($widget_key->first());
            $widgets_collection->forget($widget_key->first());

            $current_widget['status'] = $status;

            $widgets_collection->push($current_widget);
            $this->set('dashboard.widgets', $widgets_collection);
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

        $widgets_collection = $this->get('dashboard.widgets');
        if (is_null($widgets_collection)) {
            $widgets_collection = new Collection;
        }

        // List used to remove widget
        $listed_widgets = [];

        foreach (\Module::getOrdered() as $module) {

            $module_name = $module->name;
            $module_widgets_list = config(strtolower($module_name) . '.admin.dashboard.widgets');

            /*
             * Save new widgets
             */

            if (!empty($module_widgets_list)) {
                foreach ($module_widgets_list as $widget) {
                    // If widget don't exists in the list, we add it
                    if (0 == $widgets_collection->where('name', $widget)->count()) {
                        $widgets_collection->push([
                            'name' => $widget,
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

            $deleted_widgets = $widgets_collection->map(function ($item, $key) use ($listed_widgets, $module_name) {
                return !in_array($item['name'], $listed_widgets) && $module_name === $item['module'] ? $key : null;
            });

            if ($deleted_widgets->count()) {
                foreach ($deleted_widgets as $key) {
                    $widgets_collection->forget($key);
                }
            }
        }
        $this->set('dashboard.widgets', $widgets_collection);
    }
}
