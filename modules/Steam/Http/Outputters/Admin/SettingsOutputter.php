<?php namespace Modules\Steam\Http\Outputters\Admin;

use Widget;
use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class SettingsOutputter
 * @package Modules\Steam\Http\Outputters\Admin
 */
class SettingsOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'steam::admin.dashboard.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'global.settings';

    /**
     * SettingsOutputter constructor.
     *
     * @param SettingsRepository $r_settings
     */
    public function __construct(
        SettingsRepository $r_settings
    )
    {
        parent::__construct($r_settings);
        $this->set_current_module('steam');
        $this->addBreadcrumb(trans('global.settings'), 'admin/steam/settings');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $api_key = $this->r_settings->get('steam.api_key');

        return $this->output(
            'steam.admin.settings.index',
            [
                'api_key' => $api_key
            ]
        );
    }

    /**
     * @param IFormRequest $request
     * @return array
     */
    public function store(IFormRequest $request)
    {
        $api_key = $request->get('api_key');
        $this->r_settings->set('steam.api_key', $api_key);
        return $this->redirectTo('admin/steam/settings');
    }
}
