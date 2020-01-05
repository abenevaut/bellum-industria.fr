<?php

namespace obsession\App\Providers;

use Illuminate\Support\{
    Facades\Broadcast,
    ServiceProvider
};

class BroadcastServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Broadcast::routes();

        require base_path('routes/channels.php');
    }
}
