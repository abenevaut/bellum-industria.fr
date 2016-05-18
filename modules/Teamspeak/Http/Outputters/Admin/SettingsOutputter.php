<?php namespace Modules\Teamspeak\Http\Outputters\Admin;

use Widget;
use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Modules\Dashboard\Repositories\SettingsRepository;

/**
 * Class SettingsOutputter
 * @package Modules\Dashboard\Http\Outputters\Admin
 */
class SettingsOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'dashboard::admin.dashboard.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'global.settings';

    public function __construct(
        SettingsRepository $r_settings
    )
    {
        parent::__construct($r_settings);
        $this->set_current_module('dashboard');
        $this->addBreadcrumb(trans('global.settings'), 'admin/dashboard/settings');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->r_settings->checkWidgetsList();

        return $this->output(
            'dashboard.admin.settings.index',
            [
                'widgets' => $this->r_settings->allWidgets()
            ]
        );
    }

    /**
     * @param IFormRequest $request
     * @return array
     */
    public function store(IFormRequest $request)
    {
        $widgets = $request->get('widgets');
        $this->r_settings->activate($widgets);
        return $this->redirectTo('admin/dashboard/settings');
    }
}
