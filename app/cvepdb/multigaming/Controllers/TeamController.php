<?php

namespace App\CVEPDB\Multigaming\Controllers;

use Auth;

use App\CVEPDB\Multigaming\Controllers\Abs\AbsBaseController as BaseController;
use App\CVEPDB\Multigaming\Repositories\TeamRepository as TeamRepository;

use  App\CVEPDB\Multigaming\Models\User;
use GuzzleHttp\Middleware;

class TeamController extends BaseController
{
    protected $teams;

    public function __construct(TeamRepository $teams)
    {
        parent::__construct();

        $this->breadcrumbs->removeAll();
        $this->breadcrumbs->addCrumb('Home', 'multigaming/');

        $this->teams = $teams;
    }

    public function getIndex()
    {
        return view(
            'cvepdb.multigaming.teams.index',
            [
                'breadcrumbs' => $this->breadcrumbs,
                'teams' => $this->teams->all()
            ]
        );
    }

    public function getShow($team_id = 0)
    {
        return view(
            'cvepdb.multigaming.teams.index',
            [
                'breadcrumbs' => $this->breadcrumbs,
                'team' => $this->teams->find($team_id)
            ]
        );
    }

    public function getCreateTeam()
    {
        if (Auth::check()) {
        } else {
            
        }
    }
}