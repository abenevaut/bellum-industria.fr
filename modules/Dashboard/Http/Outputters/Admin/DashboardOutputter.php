<?php namespace Modules\Dashboard\Http\Outputters\Admin;

use Widget;
use Core\Http\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Dashboard\Repositories\DashboardRepositoryEloquent;

/**
 * Class DashboardOutputter
 * @package Modules\Dashboard\Http\Outputters\Admin
 */
class DashboardOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'admin.dashboard.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'admin.dashboard.meta_description';

    /**
     * @var null UserRepositoryEloquent
     */
    private $r_dashboard = null;

    public function __construct(
        DashboardRepositoryEloquent $r_dashboard
    )
    {
        parent::__construct();

        $this->r_dashboard = $r_dashboard;

        $this->set_current_module('dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $widgets = $this->r_dashboard->activeWidgets();

        return $this->output(
            'dashboard.admin.index',
            [
                'widgets' => $widgets
            ]
        );
    }

    public function update(IFormRequest $request)
    {
        $status = $request->get('status');
        $id = $request->get('id');

        switch ($status) {
            case DashboardRepositoryEloquent::DASHBOARD_WIDGET_STATUS_ACTIVE: {
                $this->r_dashboard->update(['status' => DashboardRepositoryEloquent::DASHBOARD_WIDGET_STATUS_ACTIVE], $id);
                break;
            }
            case DashboardRepositoryEloquent::DASHBOARD_WIDGET_STATUS_INACTIVE:
            default: {
                $this->r_dashboard->update(['status' => DashboardRepositoryEloquent::DASHBOARD_WIDGET_STATUS_INACTIVE], $id);
            }
        }
        return ['results' => 'success'];
    }

    public function edit()
    {
        $this->r_dashboard->checkWidgetsList();

        $active_widgets = $this->r_dashboard->activeWidgets();
        $inactive_widgets = $this->r_dashboard->inactiveWidgets();

        return $this->output(
            'dashboard.admin.settings',
            [
                'widgets' => [
                    'inactive' => $inactive_widgets,
                    'active' => $active_widgets,
                ]
            ]
        );
    }
}