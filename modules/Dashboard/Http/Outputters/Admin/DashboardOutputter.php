<?php namespace Modules\Dashboard\Http\Outputters\Admin;

use Widget;
use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Modules\Dashboard\Repositories\SettingsRepository;

/**
 * Class DashboardOutputter
 * @package Modules\Dashboard\Http\Outputters\Admin
 */
class DashboardOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'dashboard::admin.dashboard.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'dashboard::admin.dashboard.meta_description';

    public function __construct(
        SettingsRepository $r_settings
    )
    {
        parent::__construct($r_settings);
        $this->set_current_module('dashboard');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $widgets = $this->r_settings->activeWidgets();

        return $this->output(
            'dashboard.admin.index',
            [
                'widgets' => $widgets
            ]
        );
    }

    /**
     * @param IFormRequest $request
     * @return array
     */
    public function update(IFormRequest $request)
    {
        $status = $request->get('status');
        $id = $request->get('id');

        switch ($status) {
            case SettingsRepository::DASHBOARD_WIDGET_STATUS_ACTIVE: {
                $this->r_settings->update(['status' => SettingsRepository::DASHBOARD_WIDGET_STATUS_ACTIVE], $id);
                break;
            }
            case SettingsRepository::DASHBOARD_WIDGET_STATUS_INACTIVE:
            default: {
                $this->r_settings->update(['status' => SettingsRepository::DASHBOARD_WIDGET_STATUS_INACTIVE], $id);
            }
        }
        return ['results' => 'success'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        $this->r_settings->checkWidgetsList();

        $active_widgets = $this->r_settings->activeWidgets();

        dd($active_widgets);

        $inactive_widgets = $this->r_settings->inactiveWidgets();

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