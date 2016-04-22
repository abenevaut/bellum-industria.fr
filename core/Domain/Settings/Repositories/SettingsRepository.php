<?php namespace Core\Domain\Settings\Repositories;

use CVEPDB\Settings\Facades\Settings as SettingsFacade;

/**
 * Class Settings
 * @package Core\Domain\Settings\Repositories
 */
class SettingsRepository
{
    /**
     * @return mixed
     */
    public function all()
    {
        $default_settings = config('core.settings.default_from_env');
        $settings = SettingsFacade::getAll();
        foreach ($default_settings as $key) {
            if (!array_key_exists($key, $settings)) {
                $settings[$key] = SettingsFacade::get($key, env($key));
            }
        }
        return $settings;
    }

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
