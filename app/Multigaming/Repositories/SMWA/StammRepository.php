<?php

namespace App\CVEPDB\Multigaming\Repositories\SMWA;

/**
 * Class StammRepository
 * @package App\CVEPDB\Multigaming\Repositories\SMWA
 */
class StammRepository
{
    private $laravel_db_config_name = 'mysql_multigaming';

    private $stamm_db_name = 'cvepdb_smwa';

    private $stamm_tables_prefix = 'sm_multigaming_';

    private $stamm_tables = [];

    /**
     * Initialise stamm repository
     *
     * - look at DB to find Stamm tables
     */
    public function init()
    {
        // Todo :
        // Il faut faire une table qui gere les informations stamm
        // prefix stamm ('sm_multigaming_')
        // nom de la table ('csgo_1')


        $all_tables_names = \DB::connection($this->laravel_db_config_name)
            ->select(\DB::raw('SHOW TABLES'), []);

        foreach ($all_tables_names as $table_name) {
            if (
            !strncmp(
                $table_name->{'Tables_in_' . $this->stamm_db_name},
                $this->stamm_tables_prefix,
                strlen($this->stamm_tables_prefix)
            )
            ) {
                $this->stamm_tables[] = $table_name->{'Tables_in_' . $this->stamm_db_name};
            }
        }
    }

    /**
     * @param $steam_id
     * @param $points
     * @return array
     */
    public function addStammPointsToPlayer($steam_id, $points)
    {
        foreach ($this->stamm_tables as $table) {
            $this->addStammPointsToPlayerOnServer($steam_id, $table, $points);
        }
    }

    /**
     * @param $steam_id
     * @param $points
     * @return array
     */
    public function addStammPointsToPlayerOnServer($steam_id, $server_table, $points)
    {
        \DB::connection($this->laravel_db_config_name)
            ->table($server_table)
            ->where('steamid', $steam_id)
            ->increment('points', $points);
    }

    /**
     * @param $steam_id
     * @param $points
     * @return array
     */
    public function delStammPointsToPlayer($steam_id, $points)
    {
        foreach ($this->stamm_tables as $table) {
            $this->delStammPointsToPlayerOnServer($steam_id, $table, $points);
        }
    }

    /**
     * @param $steam_id
     * @param $points
     * @return array
     */
    public function delStammPointsToPlayerOnServer($steam_id, $server_table, $points)
    {
        \DB::connection($this->laravel_db_config_name)
            ->table($server_table)
            ->where('steamid', $steam_id)
            ->decrement('points', $points);
    }

    /**
     * @param $steam_id
     * @return array
     */
    public function getPlayer($steam_id)
    {
        $player = [];
        foreach ($this->stamm_tables as $table) {
            $player[$table] = \DB::connection($this->laravel_db_config_name)
                ->table($table)
                ->where('steamid', $steam_id)
                ->get();
        }
        return $player;
    }

    /**
     * @param $steam_id
     * @param $server_table
     * @return mixed
     */
    public function getPlayerOnServer($steam_id, $server_table)
    {
        $player = $this->getPlayer($steam_id);
        return $player[$server_table];
    }
}