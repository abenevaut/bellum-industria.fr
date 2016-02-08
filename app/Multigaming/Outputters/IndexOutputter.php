<?php

namespace App\Multigaming\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use App\Multigaming\Repositories\GameServerRepository;
use App\Multigaming\Repositories\SteamRepository;
use App\Multigaming\Repositories\TeamRepository;
use App\Multigaming\Repositories\SMWA\StammRepository;

class IndexOutputter extends AbsLaravelOutputter
{
    /**
     * @var GameServerRepository|null
     */
    protected $game_servers = null;

    /**
     * @var SteamRepository|null
     */
    protected $steam = null;

    /**
     * @var StammRepository|null
     */
    protected $stamm = null;

    /**
     * @var TeamRepository|null
     */
    protected $teams = null;

    public function __construct(
        GameServerRepository $r_gs,
        SteamRepository $r_steam,
        StammRepository $r_stamm,
        TeamRepository $r_team
    ) {
        parent::__construct();

        $this->game_servers = $r_gs;
        $this->steam = $r_steam;
        $this->teams = $r_team;
        $this->stamm = $r_stamm;

        $this->addBreadcrumb('Home', '/');
        $this->setBreadcrumbDivider('<i class="icon-right-dir"></i>');
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $team_bot = $this->teams->findBy('name', 'bot#CVEPDB')->toArray();
        $team_bellumindustria = $this->teams->findBy('name', 'Bellum Industria')->toArray();

//        dd($team_bot);

        foreach ($team_bot as $tkey => $team) {
            foreach ($team['users'] as $ukey => $user) {
                $team_bot[$tkey]['users'][$ukey]['steam_token'] = $this->steam->playerSummaries($user['steam_token']);
            }
        }

//        dd($team_bot);

        foreach ($team_bellumindustria as $tkey => $team) {
            foreach ($team['users'] as $ukey => $user) {
                $team_bellumindustria[$tkey]['users'][$ukey]['steam_token'] = $this->steam->playerSummaries($user['steam_token']);
            }
        }

        $game_servers[] = $this->game_servers->find('cvepdb.fr', 27015);
        $game_servers[] = $this->game_servers->find('cvepdb.fr', 27017);

        //$this->test();

        return $this->output(
            'cvepdb.multigaming.index',
            [
                'team_bot' => $team_bot,
                'team_bellumindustria' => $team_bellumindustria,
                'threads' => $this->steam->paginate('Bellum-Industria', 4),
                'game_servers' => $game_servers
            ]
        );
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function boutique()
    {
        $this->addBreadcrumb('Boutique', '/multigaming/boutique');
        return $this->output('cvepdb.multigaming.boutique', []);
    }

    public function sitemap()
    {
        return $this->generateSitemapIndex(
            ['sitemap-teams'],
            'sitemap-multigaming-index',
            3600
        );
    }

    public function test(){
        $sr = new StammRepository();
        $sr->init();
//        dd($sr->getPlayer('STEAM_0:0:13482029'));
//        dd($sr->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_1'));

//        var_dump($sr->getPlayerOnServer('STEAM_0:0:98407167', 'sm_multigaming_csgo_2'));


//        $sr->addStammPointsToPlayer('STEAM_0:0:98407167', 100);


//        var_dump($sr->getPlayerOnServer('STEAM_0:0:98407167', 'sm_multigaming_csgo_2'));
    }
}