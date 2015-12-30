<?php

namespace App\CVEPDB\Multigaming\Controllers;

use App\CVEPDB\Multigaming\Controllers\Abs\AbsBaseController as BaseController;
use App\CVEPDB\Multigaming\Domains\TeamDomain as TeamDomain;
use App\CVEPDB\Multigaming\Requests\TeamFormRequest as TeamFormRequest;

/**
 * Class TeamController
 * @package App\CVEPDB\Multigaming\Controllers
 */
class TeamController extends BaseController
{
    /**
     * @var TeamDomain|null Domain object
     */
    private $domain = null;

    public function __construct()
    {
        $this->domain = new TeamDomain;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        return $this->domain->teamsIndex();
    }

    /**
     * @param $team_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShow($team_id)
    {
        return $this->domain->teamIndex($team_id);
    }

    /**
     * @param TeamFormRequest $request
     * @return mixed
     */
    public function postStoreTeam(TeamFormRequest $request)
    {
        return $this->domain->teamRecord($request);
    }

    /**
     * @param $team_id
     * @param TeamFormRequest $request
     * @return mixed
     */
    public function putStoreTeam($team_id, TeamFormRequest $request)
    {
        return $this->domain->teamUpdate($team_id, $request);
    }

    /**
     * @param $team_id
     * @return mixed
     */
    public function deleteRemoveTeam($team_id)
    {
        return $this->domain->teamDelete($team_id);
    }

    /**
     * @return mixed
     */
    public function getSitemap()
    {
        return $this->domain->teamsSitemap();
    }
}
