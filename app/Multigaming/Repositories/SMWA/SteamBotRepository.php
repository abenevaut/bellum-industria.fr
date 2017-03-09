<?php namespace cms\Multigaming\Repositories\SMWA;

/**
 * Class SteamBotRepository
 * @package cms\Multigaming\Repositories\SMWA
 */
class SteamBotRepository
{
    private $laravel_db_config_name = 'bellumindustria_production_steambot';

    private $steambot_tables_prefix = 'steambot_';

    public function lastTrades()
    {
        return \DB::connection($this->laravel_db_config_name)
            ->table($this->steambot_tables_prefix . 'offers')
            ->orderBy('created_at', 'desc')
            ->where('state', 3)
            ->take(1)
            ->get();
    }
}