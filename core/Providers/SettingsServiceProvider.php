<?php namespace Core\Providers;

use Illuminate\Support\ServiceProvider;
use CVEPDB\Settings\Facades\Settings;

/**
 * Class SettingsServiceProvider
 * @package Core\Providers
 */
class SettingsServiceProvider extends ServiceProvider
{
    /**
     * Overwrite settings with settings table
     */
    public function register()
    {
        if (cmsinstalled()) {
            $this->app->booting(function () {
                $settings = [
                    'APP_SITE_NAME' => Settings::get('APP_SITE_NAME'),
                    'APP_SITE_DESCRIPTION' => Settings::get('APP_SITE_DESCRIPTION'),
                    'APP_CONTACT_MAIL' => Settings::get('APP_CONTACT_MAIL'),
                    'APP_CONTACT_DISPLAY_NAME' => Settings::get('APP_CONTACT_DISPLAY_NAME'),
                ];
                foreach ($settings as $env_name => $env_value) {
                    if (!is_null($env_value)) {
                        putenv("$env_name=\"$env_value\"");
                    }
                }
            });
        }
    }
}
