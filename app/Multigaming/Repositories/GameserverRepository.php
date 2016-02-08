<?php

namespace App\Multigaming\Repositories;

use Cache;

use xPaw\SourceQuery\SourceQuery as SourceQuery;

/**
 * Class TeamRepository
 * @package App\CVEPDB\Multigaming\Repositories
 */
class GameServerRepository
{
    const KIND_SourceQuery = SourceQuery::SOURCE;

    const BASE_CACHE_KEY = 'GameServerRepository';

    private $debug = false;

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($ip, $port, $columns = array('*'), $timeout = 3)
    {
        $cache_key = self::BASE_CACHE_KEY . '_find_' . str_replace('.', '_', $ip) . '-' . $port;

        if (!Cache::has($cache_key)) {

            if ($this->debug) {
                $timer = MicroTime(true);
            }

            $info = [];
            $rules = [];
            $players = [];

            $sq = new SourceQuery();

            try {
                $sq->Connect($ip, $port, $timeout, self::KIND_SourceQuery);
                $info = $sq->GetInfo();
                $players = $sq->GetPlayers();
                $rules = $sq->GetRules();
            } catch (Exception $e) {
                $Exception = $e;
            } finally {
                $sq->Disconnect();
            }

            if ($this->debug) {
                $timer = Number_Format(MicroTime(true) - $timer, 4, '.', '');
            }

            $infos = ['info' => $info, 'rules' => $rules, 'players' => $players];

            Cache::put($cache_key, $infos, 5);
        }

        return Cache::get($cache_key);
    }
}