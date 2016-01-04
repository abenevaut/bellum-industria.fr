<?php

namespace App\CVEPDB\Multigaming\Domains;

use App\CVEPDB\Multigaming\Repositories\GameServerRepository as GameServerRepository;
use App\CVEPDB\Multigaming\Repositories\SteamRepository as SteamRepository;
use App\CVEPDB\Multigaming\Repositories\TeamRepository as TeamRepository;
use App\CVEPDB\Multigaming\Outputters\IndexOutputter as indexOutputter;

/**
 * Class IndexDomain
 * @package App\CVEPDB\Multigaming\Domains
 */
class IndexDomain
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
     * @var TeamRepository|null
     */
    protected $teams = null;

    /**
     * @var IndexOutputter|null
     */
    protected $Outputter = null;

    public function __construct()
    {
        $this->game_servers = new GameServerRepository;
        $this->steam = new SteamRepository;
        $this->teams = new TeamRepository;

        $this->Outputter = new IndexOutputter;
        $this->Outputter->addBreadcrumb('Home', '/');
        $this->Outputter->setBreadcrumbDivider('<i class="icon-right-dir"></i>');
    }

    public function indexIndex()
    {
        return $this->Outputter->outputIndex([
            'team_bot' => $this->teams->findBy('name', 'Bot CVEPDB'),
            'team_bellumindustria' => $this->teams->findBy('name', 'Bellum Industria'),
            'threads' => $this->steam->paginate('Bellum-Industria', 4)
        ]);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBoutique()
    {
        $this->Outputter->addBreadcrumb('Boutique', '/multigaming/boutique');
        return $this->Outputter->outputBoutique([
            //
        ]);
    }

    public function indexSitemap()
    {
        return $this->Outputter->generateSitemapIndex(
            'multigaming/teams/sitemap',
            'sitemap-multigaming-index',
            3600
        );
    }
}
