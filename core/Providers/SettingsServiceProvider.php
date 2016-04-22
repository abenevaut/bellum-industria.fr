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

                    'CORE_SITE_NAME' => Settings::get('CORE_SITE_NAME', env('CORE_SITE_NAME')),
                    'CORE_SITE_DESCRIPTION' => Settings::get('CORE_SITE_DESCRIPTION', env('CORE_SITE_DESCRIPTION')),
                    'CORE_CONTACT_MAIL' => Settings::get('CORE_CONTACT_MAIL', env('CORE_CONTACT_MAIL')),
                    'CORE_CONTACT_DISPLAY_NAME' => Settings::get('CORE_CONTACT_DISPLAY_NAME', env('CORE_CONTACT_DISPLAY_NAME')),

                    'CORE_MAIL_DRIVER' => Settings::get('CORE_MAIL_DRIVER', env('CORE_MAIL_DRIVER', '')),
                    'CORE_MAIL_HOST' => Settings::get('CORE_MAIL_HOST', env('CORE_MAIL_HOST', '')),
                    'CORE_MAIL_PORT' => Settings::get('CORE_MAIL_PORT', env('CORE_MAIL_PORT', '')),
                    'CORE_MAIL_ENCRYPTION' => Settings::get('CORE_MAIL_ENCRYPTION', env('CORE_MAIL_ENCRYPTION', '')),
                    'CORE_MAIL_USERNAME' => Settings::get('CORE_MAIL_USERNAME', env('CORE_MAIL_USERNAME', '')),
                    'CORE_MAIL_PASSWORD' => Settings::get('CORE_MAIL_PASSWORD', env('CORE_MAIL_PASSWORD', '')),

                    

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
