<?php namespace Modules\Dashboard\Outputters;

use Widget;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Dashboard\Repositories\DashboardRepositoryEloquent;

class AdminDashboardOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'Dashboard';

    /**
     * @var string Outputter header description
     */
    protected $description = 'control panel';

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
        $type = $request->get('type');
        $id = $request->get('id');

        switch ($type) {
            case 'active': {
                $this->r_dashboard->update(['status' => DashboardRepositoryEloquent::DASHBOARD_WIDGET_STATUS_ACTIVE], $id);
                break;
            }
            case 'inactive':
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
            'dashboard.admin.config',
            [
                'widgets' => [
                    'inactive' => $inactive_widgets,
                    'active' => $active_widgets,
                ]
            ]
        );
    }
}