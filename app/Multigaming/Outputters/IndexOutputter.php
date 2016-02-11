<?php

namespace App\Multigaming\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use App\Multigaming\Repositories\GameServerRepository;
use App\Multigaming\Repositories\SteamRepository;
use App\Multigaming\Repositories\TeamRepository;
use App\Multigaming\Repositories\SMWA\StammRepository;

use ToniPeric\Clash\Clan as COCClan;
use ToniPeric\Clash\Member as COCMember;
use ToniPeric\Clash\Members as COCMembers;
use ToniPeric\Clash\Http\Client as COCClient;

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

        $this->stamm->init();

        $this->addBreadcrumb('Home', '/');
        $this->setBreadcrumbDivider('<i class="icon-right-dir"></i>');
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $coc_clan = COCClient::getClanDetails('#PY2UJ8C0');

        $team_bot = $this->teams->findBy('name', 'bot#CVEPDB')->toArray();
        $team_bellumindustria = $this->teams->findBy('name', 'Bellum Industria')->toArray();

        foreach ($team_bot as $tkey => $team) {
            foreach ($team['users'] as $ukey => $user) {
                $team_bot[$tkey]['users'][$ukey]['steam_token'] = $this->steam->playerSummaries($user['steam_token']);
            }
        }

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
                'game_servers' => $game_servers,
                'coc_clan' => $coc_clan
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

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function challenge()
    {
        $this->addBreadcrumb('Challenge', '/multigaming/challenge');
        return $this->output('cvepdb.multigaming.challenge', []);
    }

    public function messageoftheday() {

        $team_bot = $this->teams->findBy('name', 'bot#CVEPDB')->toArray();

        foreach ($team_bot as $tkey => $team) {
            foreach ($team['users'] as $ukey => $user) {
                $team_bot[$tkey]['users'][$ukey]['steam_token'] = $this->steam->playerSummaries($user['steam_token']);
            }
        }

        $this->addBreadcrumb('Message of the day', '/multigaming/message-of-the-day');
        return $this->output(
            'cvepdb.multigaming.messageoftheday',
            [
                'team_bot' => $team_bot,
                'threads' => $this->steam->paginate('Bellum-Industria', 4)
            ]
        );
    }

    public function sitemap()
    {
        return $this->generateSitemapIndex(
            ['sitemap-teams'],
            'sitemap-multigaming-index',
            3600
        );
    }

    public function ranks(){
//        dd( $this->stamm->getPlayer('STEAM_0:0:13482029') );

//        dd( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_1') );




        # ADD POINTS

//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );
//        $this->stamm->addStammPointsToPlayer('STEAM_0:0:13482029', 100);
//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );



        # SUB POINTS

//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );
//        $this->stamm->delStammPointsToPlayer('STEAM_0:0:13482029', 100);
//        var_dump( $this->stamm->getPlayerOnServer('STEAM_0:0:13482029', 'sm_multigaming_csgo_2') );




    }
}