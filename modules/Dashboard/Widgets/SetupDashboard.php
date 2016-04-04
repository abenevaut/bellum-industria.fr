<?php namespace Modules\Dashboard\Widgets;

use Widget;
use App\Http\Contracts\AbsWidgets;
use Modules\Dashboard\Repositories\DashboardRepositoryEloquent;

class SetupDashboard extends AbsWidgets
{
    /**
     * @var string Widget title
     */
    protected $title = 'Setup dashboard';

    /**
     * @var string Widget description
     */
    protected $description = 'Display widgets in dashboard';

    /**
     * @var string View namespace ('dashboard::'|null)
     */
    protected $view_prefix = 'dashboard::';

    /**
     * @var string
     */
    protected $module = 'dashboard::';

    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_dash = null;

    public function __construct(DashboardRepositoryEloquent $r_dash)
    {
        $this->r_dash = $r_dash;
    }

    public function register($action = null)
    {
        switch ($action) {
            case 'info': {
                return $this->widgetInformation();
            }
            default: {
                $this->r_dash->checkWidgetsList();

                $active_widgets = $this->r_dash->activeWidgets();
                $inactive_widgets = $this->r_dash->inactiveWidgets();

                return $this->output(
                    'dashboard.widgets.setupdashboard',
                    [
                        'widgets' => [
                            'inactive' => $inactive_widgets,
                            'active' => $active_widgets,
                        ]
                    ]
                );
            }
        }
    }
}
