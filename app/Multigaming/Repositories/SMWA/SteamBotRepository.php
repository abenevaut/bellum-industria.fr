<?php

namespace App\Multigaming\Repositories\SMWA;

/**
 * Class SteamBotRepository
 * @package App\CVEPDB\Multigaming\Repositories\SMWA
 */
class SteamBotRepository
{
    private $laravel_db_config_name = 'mysql_multigaming';

    private $steambot_tables_prefix = 'steambot_';

    public function twoLastTrades()
    {
        return \DB::connection($this->laravel_db_config_name)
            ->table($this->steambot_tables_prefix . 'offers')
            ->orderBy('created_at', 'desc')
            ->where('state', 3)
            ->take(3)
            ->get();
    }
}