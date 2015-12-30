<?php

namespace App\CVEPDB\Multigaming\Outputters;

use Redirect;

use App\CVEPDB\Interfaces\Outputters\AbsLaravelOutputter;
use App\CVEPDB\Interfaces\Outputters\AbsOutputterSitemapFormat;

class TeamOutputter extends AbsLaravelOutputter
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function outputTeamsIndex($data)
    {
        return $this->output('cvepdb.multigaming.teams.index', $data);
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
        return Redirect::route('teams')
            ->with('message', 'You must specify a team id to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamIndexWithErrorTeamNotExists()
    {
        return Redirect::route('teams')
            ->with('message', 'The team was not deleted because no team exists!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamRecordWithSuccess()
    {
        return Redirect::route('teams')
            ->with('message', 'The team was successfully added!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamRecordWithErrorAuth()
    {
        return Redirect::route('teams')
            ->with('message', 'You must be authentificated to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithSuccess()
    {
        return Redirect::route('teams')
            ->with('message', 'The team was successfully edited!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithErrorNoTeamId()
    {
        return Redirect::route('teams')
            ->with('message', 'You must specify a team id to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithErrorTeamNotExists()
    {
        return Redirect::route('teams')
            ->with('message', 'The team was not deleted because no team exists!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamUpdateWithErrorAuth()
    {
        return Redirect::route('teams')
            ->with('message', 'You must be authentificated to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamDeleteWithSuccess()
    {
        return Redirect::route('teams')
            ->with('message', 'The team was successfully removed!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @return mixed
     */
    public function redirectTeamDeleteWithErrorAuth()
    {
        return Redirect::route('teams')
            ->with('message', 'You must be authentificated to use this functionality!')
            ->with('alert-class', 'warning-box');
    }

    /**
     * @param AbsOutputterSitemapFormat $format
     * @param $teams
     * @return mixed
     */
    public function generateTeamsSitemap(AbsOutputterSitemapFormat $format, $teams)
    {
        return $this->generateSitemap(
            $format,
            $teams->toArray(),
            'multigaming/teams/show/',
            'sitemap-multigaming-teams-',
            'sitemap-multigaming-teams'
        );
    }
}