<?php

namespace Modules\Dashboard\Repositories;

use Config;
use Module;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Modules\Dashboard\Repositories\DashboardRepository;
use Modules\Dashboard\Entities\Dashboard;

/**
 * Class DashboardRepositoryEloquent
 * @package namespace App\Repositories;
 */
class DashboardRepositoryEloquent extends BaseRepository implements DashboardRepository
{
    const DASHBOARD_WIDGET_STATUS_ACTIVE = 'active';
    const DASHBOARD_WIDGET_STATUS_INACTIVE = 'disabled';


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Dashboard::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * Get active dashboard widgets list
     *
     * @return mixed
     */
    public function activeWidgets()
    {
        return $this->findWhereIn('status', [self::DASHBOARD_WIDGET_STATUS_ACTIVE]);
    }

    /**
     * Get inactive dashboard widgets list
     *
     * @return mixed
     */
    public function inactiveWidgets()
    {
        return $this->findWhereIn('status', [self::DASHBOARD_WIDGET_STATUS_INACTIVE]);
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
        $registered_widgets_tmp = $this->all(['id', 'name', 'module']);
        $registered_widgets = [];

        foreach ($registered_widgets_tmp as $widget) {
            if (!array_key_exists($widget['module'], $registered_widgets)) {
                $registered_widgets[$widget['module']] = [];
            }
            $registered_widgets[$widget['module']][$widget['id']] = $widget['name'];
        }

        foreach (Module::getOrdered() as $module) {

            $recorded_module_widgets = [];

            if (array_key_exists($module->name, $registered_widgets)) {
                $recorded_module_widgets = $registered_widgets[$module->name];
            }

            $module_widgets = Config(strtolower($module->name) . '.admin.widgets');

            if (!empty($module_widgets)) {
                foreach ($module_widgets as $widget) {
                    if (!in_array($widget, $recorded_module_widgets)) {
                        $this->create([
                            'name' => $widget,
                            'module' => $module->name,
                            'status' => self::DASHBOARD_WIDGET_STATUS_INACTIVE
                        ]);
                        unset($recorded_module_widgets[array_search($widget, $recorded_module_widgets)]);
                    } else if (in_array($widget, $recorded_module_widgets)) {
                        unset($recorded_module_widgets[array_search($widget, $recorded_module_widgets)]);
                    }
                }
            }

            if (!empty($recorded_module_widgets)) {
                foreach (array_keys($recorded_module_widgets) as $id) {
                    $this->delete($id);
                }
            }
        }
    }
}
