<?php namespace Modules\Users\Widgets;

use Widget;
use App\Http\Contracts\AbsWidgets;

class CountUsers extends AbsWidgets
{
    /**
     * @var string Widget title
     */
    protected $title = 'Count users';

    /**
     * @var string Widget description
     */
    protected $description = 'Display a users counter in the dashboard';

    /**
     * @var string View namespace ('dashboard::'|null)
     */
    protected $view_prefix = 'dashboard::';

    public function register()
    {
        return $this->output('dashboard.widgets.countusers', []);
    }
}
