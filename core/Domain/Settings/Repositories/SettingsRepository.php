<?php namespace Core\Domain\Settings\Repositories;

use CVEPDB\Settings\Facades\Settings as SettingsFacade;

/**
 * Class Settings
 * @package Core\Domain\Settings\Repositories
 */
class SettingsRepository
{
    /**
     * @param $key
     * @param $data
     */
    public function set($key, $data)
    {
        SettingsFacade::set($key, $data);
    }

    /**
     * @param $key
     */
    public function get($key)
    {
        return SettingsFacade::get($key);
    }

    /**
     * @param $key
     */
    public function delete($key)
    {
        SettingsFacade::forget($key);
    }
}
