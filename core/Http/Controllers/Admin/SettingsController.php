<?php namespace Core\Http\Controllers\Admin;

use Request;
use CVEPDB\Settings\Facades\Settings;
use Core\Http\Controllers\CoreAdminController;
use Core\Http\Requests\Admin\SettingsGetFormRequest;
use Core\Http\Requests\Admin\SettingsSetFormRequest;

/**
 * Class SettingsController
 * @package Core\Http\Controllers\Admin
 */
class SettingsController extends CoreAdminController
{
    /**
     * @param SettingsGetFormRequest $request
     * @return array
     */
    public function get(SettingsGetFormRequest $request)
    {
        $data = [];
        $setting_key = $request->get('setting_key');
        if (Request::ajax()) {
            $data = [
                $setting_key => Settings::get($setting_key)
            ];
        }
        return \Response::json($data);
    }

    /**
     * @param SettingsSetFormRequest $request
     * @return array
     */
    public function set(SettingsSetFormRequest $request)
    {
        $data = [];
        $setting_key = $request->get('setting_key');
        $setting_value = $request->get('setting_value');
        if (Request::ajax()) {
            Settings::set($setting_key, $setting_value);
            $data = [
                $setting_key => $setting_value
            ];
        }
        return \Response::json($data);
    }
}
