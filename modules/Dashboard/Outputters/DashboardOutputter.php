<?php namespace Modules\Dashboard\Outputters;

use Widget;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Dashboard\Repositories\DashboardRepositoryEloquent;

class DashboardOutputter extends AdminOutputter
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

        $this->set_view_prefix('dashboard');

        $this->r_dashboard = $r_dashboard;

        $this->addBreadcrumb('Dashboard', 'admin/dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

        // repository
        // On recupere la liste des widgets actifs et on les generes



        //dd( Widget::get('count_users') );


        $widgets = $this->r_dashboard->activeWidgets();

        return $this->output(
            'dashboard.admin.index',
            [
                'widgets' => $widgets
            ]
        );
    }

    public function edit()
    {
        $this->r_dashboard->checkWidgetsList();

        $active_widgets = $this->r_dashboard->activeWidgets();
        $disabled_widgets = $this->r_dashboard->inactiveWidgets();

        return $this->output(
            'dashboard.admin.config',
            [
                'widgets' => [
                    'disabled' => $disabled_widgets,
                    'active' => $active_widgets,
                ]
            ]
        );
    }
}