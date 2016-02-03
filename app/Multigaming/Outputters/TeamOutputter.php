<?php

namespace App\Multigaming\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
//use App\Multigaming\Outputters\SitemapFormats\TeamFormat as TeamSitemapFormat;
//use App\Multigaming\Outputters\FeedsFormats\TeamFormat as TeamFeedsFormat;

class TeamOutputter extends AbsLaravelOutputter
{
    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function outputTeamsIndex($data)
    {
        return $this->output('cvepdb.multigaming.teams.index', $data);
    }

//    /**
//     * @param $data
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function outputTeamIndex($data)
//    {
//        return $this->output('cvepdb.multigaming.teams.show', $data);
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamIndexWithErrorNoTeamId()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'You must specify a team id to use this functionality!')
//            ->with('alert-class', 'warning-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamIndexWithErrorTeamNotExists()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'The team was not deleted because no team exists!')
//            ->with('alert-class', 'warning-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamRecordWithSuccess()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'The team was successfully added!')
//            ->with('alert-class', 'download-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamRecordWithErrorAuth()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'You must be authentificated to use this functionality!')
//            ->with('alert-class', 'warning-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamUpdateWithSuccess()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'The team was successfully edited!')
//            ->with('alert-class', 'download-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamUpdateWithErrorNoTeamId()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'You must specify a team id to use this functionality!')
//            ->with('alert-class', 'warning-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamUpdateWithErrorTeamNotExists()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'The team was not deleted because no team exists!')
//            ->with('alert-class', 'warning-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamUpdateWithErrorAuth()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'You must be authentificated to use this functionality!')
//            ->with('alert-class', 'warning-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamDeleteWithSuccess()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'The team was successfully removed!')
//            ->with('alert-class', 'download-box');
//    }
//
//    /**
//     * @return mixed
//     */
//    public function redirectTeamDeleteWithErrorAuth()
//    {
//        return $this->routeTo('teams')
//            ->with('message', 'You must be authentificated to use this functionality!')
//            ->with('alert-class', 'warning-box');
//    }
//
//    /**
//     * @param $teams
//     * @return mixed
//     */
//    public function generateTeamsSitemap($teams)
//    {
//        return $this->generateSitemap(
//            new TeamSitemapFormat,
//            $teams->toArray(),
//            'multigaming/teams/show/',
//            'sitemap-multigaming-teams-',
//            'sitemap-multigaming-teams'
//        );
//    }
//
//    /**
//     * @param $teams
//     * @return mixed
//     */
//    public function generateTeamsFeeds($teams)
//    {
//        return $this->generateFeeds(
//            new TeamFeedsFormat,
//            $teams->toArray(),
//            'multigaming/teams/show/',
//            'sitemap-multigaming-teams'
//        );
//    }
}