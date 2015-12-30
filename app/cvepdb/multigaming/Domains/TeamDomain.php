<?php

namespace App\CVEPDB\Multigaming\Domains;

use Auth;

use App\CVEPDB\Multigaming\Repositories\TeamRepository as TeamRepository;
use App\CVEPDB\Multigaming\Requests\TeamFormRequest as TeamFormRequest;
use App\CVEPDB\Multigaming\Outputters\TeamOutputter as TeamOutputter;

/**
 * Class TeamDomain
 * @package App\CVEPDB\Multigaming\Domains
 */
class TeamDomain
{
    /**
     * @var TeamRepository|null
     */
    protected $teams = null;

    /**
     * @var TeamOutputter|null
     */
    protected $Outputter = null;

    public function __construct()
    {
        $this->teams = new TeamRepository;
        $this->Outputter = new TeamOutputter;

        $this->Outputter->addBreadcrumb('Home', '/');
        $this->Outputter->setBreadcrumbDivider('<i class="icon-right-dir"></i>');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function teamsIndex()
    {
        $this->Outputter->addBreadcrumb('Teams', '/multigaming/teams');
        return $this->Outputter->outputTeamsIndex([
                'teams' => $this->teams->paginate(5)
        ]);
    }

    /**
     * @param $team_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function teamIndex($team_id)
    {
        if (!$team_id || !is_numeric($team_id)) {
            $this->Outputter->redirectTeamIndexWithErrorNoTeamId();
        }

        $team = $this->teams->find($team_id);

        // Todo : check si l'objet n'est pas vide en terme de donnee
//        if (!$team) {
//            $this->Outputter->redirectTeamIndexWithErrorTeamNotExists();
//        }

        $this->Outputter->addBreadcrumb('Teams', '/multigaming/teams');
        $this->Outputter->addBreadcrumb($team->name, '/multigaming/teams/show/' . $team_id);
        return $this->Outputter->outputTeamIndex([
            'team' => $team
        ]);
    }

    /**
     * @param TeamFormRequest $request
     * @return mixed
     */
    public function teamRecord(TeamFormRequest $request)
    {
        if (!Auth::check()) {
            $this->Outputter->redirectTeamRecordWithErrorAuth();
        }

        $this->teams->create([
            'name' => $request->get('name')
        ]);
        return $this->Outputter->redirectTeamRecordWithSuccess();
    }

    /**
     * @param $team_id
     * @param TeamFormRequest $request
     * @return mixed
     */
    public function teamUpdate($team_id, TeamFormRequest $request)
    {
        if (!Auth::check()) {
            $this->Outputter->redirectTeamUpdateWithErrorAuth();
        }

        if (!$team_id || !is_numeric($team_id)) {
            $this->Outputter->redirectTeamUpdateWithErrorNoTeamId();
        }

        $team = $this->teams->find($team_id);

        // Todo : check si l'objet n'est pas vide en terme de donnee
//        if (!$team) {
//            $this->Outputter->redirectTeamUpdateWithErrorTeamNotExists();
//        }

        $this->teams->update($team, [
                'name' => $request->get('name')
        ]);
        return $this->Outputter->redirectTeamUpdateWithSuccess();
    }

    /**
     * @param $team_id
     * @return mixed
     */
    public function teamDelete($team_id)
    {
        if (!Auth::check()) {
            $this->Outputter->redirectTeamDeleteWithErrorAuth();
        }

        $this->teams->deleteById($team_id);

        return $this->Outputter->redirectTeamDeleteWithSuccess();
    }

    /**
     * @return mixed
     */
    public function teamsSitemap()
    {
        $teams = $this->teams->all();
        return $this->Outputter->generateTeamsSitemap($teams);
    }

    /**
     * @return mixed
     */
    public function teamsFeeds()
    {
        $teams = $this->teams->all();
        return $this->Outputter->generateTeamsFeeds($teams);
    }
}
