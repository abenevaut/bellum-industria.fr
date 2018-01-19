<?php

namespace bellumindustria\Console;

use bellumindustria\Console\Commands\BellumIndustriaVersionCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
		\bellumindustria\Console\Commands\BellumIndustriaProductionPostDeployCommand::class,
		\bellumindustria\Console\Commands\BellumIndustriaProductionPreDeployCommand::class,
		\bellumindustria\Console\Commands\BellumIndustriaVersionCommand::class,
        \bellumindustria\Console\Commands\Sitemap\GenerateSitemap::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule
            ->command('sitemap:generate')
            ->daily();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
