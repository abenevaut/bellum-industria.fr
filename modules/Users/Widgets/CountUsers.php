<?php namespace Modules\Users\Widgets;

use Widget;
use App\Http\Contracts\AbsWidgets;
use Modules\Users\Repositories\UserRepositoryEloquent;

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
    protected $view_prefix = 'users::';

    /**
     * @var string
     */
    protected $module = 'users::';

    /**
     * @var UserRepositoryEloquent|null
     */
    private $r_user = null;

    public function __construct(UserRepositoryEloquent $r_user)
    {
        $this->r_user = $r_user;
    }

    public function register($action = null)
    {
        switch ($action) {
            case 'info': {
                return $this->widgetInformation();
            }
            default:
                return $this->output('users.widgets.countusers', ['nb_users' => $this->r_user->allCount()]);
        }
    }
}
