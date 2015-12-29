<?php

namespace App\CVEPDB\Multigaming\Controllers;

use Auth;
use Session;

use App\CVEPDB\Multigaming\Controllers\Abs\AbsBaseController as BaseController;
use App\CVEPDB\Multigaming\Repositories\TeamRepository as TeamRepository;
use App\CVEPDB\Multigaming\Requests\TeamFormRequest as TeamFormRequest;

use  App\CVEPDB\Multigaming\Models\User;
use GuzzleHttp\Middleware;

class TeamController extends BaseController
{
    protected $teams;

    /**
     * @param TeamRepository $teams
     */
    public function __construct(TeamRepository $teams)
    {
        parent::__construct();

        $this->teams = $teams;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getIndex()
    {
        $this->breadcrumbs->addCrumb('Teams', '/multigaming/teams');

        return view(
            'cvepdb.multigaming.teams.index',
            [
                'breadcrumbs' => $this->breadcrumbs,
                'teams' => $this->teams->paginate(5)
            ]
        );
    }

    /**
     * @param int $team_id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getShow($team_id)
    {
        if (!$team_id || !is_numeric($team_id)) {
            redirect('multigaming/teams');
        }

        $team = $this->teams->find($team_id);

        $this->breadcrumbs->addCrumb('Teams', '/multigaming/teams');
        $this->breadcrumbs->addCrumb($team->name, '/multigaming/teams/show/' . $team_id);

        return view(
            'cvepdb.multigaming.teams.show',
            [
                'breadcrumbs' => $this->breadcrumbs,
                'team' => $team
            ]
        );
    }

    /**
     * AJAX
     *
     * @return mixed
     */
    public function postStoreTeam(TeamFormRequest $request)
    {
        if (!Auth::check()) {
            redirect('multigaming');
        }

        $this->teams->create([
            'name' => $request->get('name')
        ]);

        return \Redirect::route('teams')
            ->with('message', 'The team was successfully added!');
    }
}
