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
        $this->overrideViewPath();
        $this->setActiveTheme();
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

        if ($this->inAdministration()) {
            $theme = config('app.themes.backend');
        }
        else {
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