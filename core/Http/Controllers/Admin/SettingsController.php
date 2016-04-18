<?php namespace Core\Http\Controllers\Admin;

use Request;
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
    public function get(/*SettingsGetFormRequest $request*/)
    {
        $data = [false];
//        $setting_key = $request->get('setting_key');

        if (Request::ajax()) {



        }
        return $data;
    }

    /**
     * @param SettingsSetFormRequest $request
     * @return array
     */
    public function set(/*SettingsSetFormRequest $request*/)
    {
        $data = [false];
//        $setting_key = $request->get('setting_key');
//        $setting_value = $request->get('setting_value');

        if (Request::ajax()) {



        }
        return $data;
    }
}
