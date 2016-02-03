<?php

namespace App\Multigaming\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use App\Multigaming\Outputters\SitemapFormats\TeamFormat as TeamSitemapFormat;
use App\Multigaming\Outputters\FeedsFormats\TeamFormat as TeamFeedsFormat;
use App\Multigaming\Repositories\TeamRepository as TeamRepository;
use App\Multigaming\Repositories\UserRepository as UserRepository;
use App\Multigaming\Requests\TeamFormRequest as TeamFormRequest;

class TeamOutputter extends AbsLaravelOutputter
{

    /**
     * @var TeamRepository|null
     */
    protected $teams = null;

    /**
     * @var UserRepository|null
     */
    protected $users = null;

    public function __construct(TeamRepository $r_team, UserRepository $r_user)
    {
        parent::__construct();

        $this->teams = $r_team;
        $this->users = $r_user;

        $this->addBreadcrumb('Home', '/');
        $this->setBreadcrumbDivider('<i class="icon-right-dir"></i>');
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $this->addBreadcrumb('Teams', 'teams');
        return $this->output(
            'cvepdb.multigaming.teams.index',
            [
                'teams' => $this->teams->paginate(5)
            ]
        );
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function outputTeamIndex($data)
    {
        return $this->output('cvepdb.multigaming.teams.show', $data);
    }

    /**
     * @return mixed
     */
    public function redirectTeamIndexWithErrorNoTeamId()
    {
        return $this->routeTo('teams')
            ->with('message', 'You must specify a team id to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamIndexWithErrorTeamNotExists()
    {
        return $this->routeTo('teams')
            ->with('message', 'The team was not deleted because no team exists!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamRecordWithSuccess()
    {
        return $this->routeTo('teams')
            ->with('message', 'The team was successfully added!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamRecordWithErrorAuth()
    {
        return $this->routeTo('teams')
            ->with('message', 'You must be authentificated to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithSuccess()
    {
        return $this->routeTo('teams')
            ->with('message', 'The team was successfully edited!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithErrorNoTeamId()
    {
        return $this->routeTo('teams')
            ->with('message', 'You must specify a team id to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithErrorTeamNotExists()
    {
        return $this->routeTo('teams')
            ->with('message', 'The team was not deleted because no team exists!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithErrorAuth()
    {
        return $this->routeTo('teams')
            ->with('message', 'You must be authentificated to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamDeleteWithSuccess()
    {
        return $this->routeTo('teams')
            ->with('message', 'The team was successfully removed!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamDeleteWithErrorAuth()
    {
        return $this->routeTo('teams')
            ->with('message', 'You must be authentificated to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @param $teams
     * @return mixed
     */
    public function generateTeamsSitemap($teams)
    {
        return $this->generateSitemap(
            new TeamSitemapFormat,
            $teams->toArray(),
            'multigaming/teams/show/',
            'sitemap-multigaming-teams-',
            'sitemap-multigaming-teams'
        );
    }

    /**
     * @param $teams
     * @return mixed
     */
    public function generateTeamsFeeds()
    {
        $teams = $this->teams->all();
        return $this->generateFeeds(
            new TeamFeedsFormat,
            $teams->toArray(),
            'multigaming/teams/show/',
            'sitemap-multigaming-teams'
        );
    }
}