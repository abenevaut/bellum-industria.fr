<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\FileViewFinder;
use Theme;
use Config;

/**
 * Class ThemesServiceProvider
 *
 * Allow to use the right front/back end theme by first URI (looking for 'app.backend' first segment)
 *
 * @package App\Providers
 */
class ThemesServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->overrideConfig();
        $this->overrideViewPath();
        $this->setActiveTheme();
    }

    protected function overrideConfig()
    {
        if (file_exists(config('themes.config.file'))) {
            $theme_config = file_get_contents(config('themes.config.file'));
            $theme_config = json_decode($theme_config);
            Config::set('app.themes.backend', $theme_config->backend);
            Config::set('app.themes.frontend', $theme_config->frontend);
        }
    }

    /**
     * Override view path.
     */
    protected function overrideViewPath()
    {
        $this->app->bind('view.finder', function ($app) {

            $paths = [];
            $themes = [];

            foreach (Theme::all() as $theme) {
                $themes[] = $theme->name;
            }

            foreach ($themes as $theme) {
                $themePath = $app['config']['themes.path'] . '/' . $theme . '/views';

                if (is_dir($themePath)) {
                    $paths[] = $themePath;
                }
            }

            return new FileViewFinder($app['files'], $paths);
        });
    }

    /**
     * Set the active theme based on the settings
     */
    private function setActiveTheme()
    {
        $theme = '';

        /*
         * Todo : get front/back end theme from DB/JSON/CACHE something fast
         */

        if ($this->inAdministration()) {
            $theme = config('app.themes.backend');
        } else {
            $theme = config('app.themes.frontend');
        }

        Theme::setCurrent($theme);
    }

    /**
     * Check if we are in the administration section
     * @return bool
     */
    private function inAdministration()
    {
        return $this->app->make('request')->is(config('app.backend'))
        || $this->app->make('request')->is(config('app.backend') . '/*');
    }

}