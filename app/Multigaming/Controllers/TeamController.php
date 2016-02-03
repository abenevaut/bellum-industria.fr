<?php

namespace App\Multigaming\Controllers;

use CVEPDB\Controllers\AbsBaseController as BaseController;
use App\Multigaming\Outputters\TeamOutputter;
use App\Multigaming\Requests\TeamFormRequest;

/**
 * Class TeamController
 * @package App\CVEPDB\Multigaming\Controllers
 */
class TeamController extends BaseController
{
    /**
     * @var TeamOutputter|null
     */
    private $outputter = null;

    public function __construct(TeamOutputter $outputter)
    {
        $this->outputter = $outputter;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->outputter->index();
    }

//    /**
//     * @param $team_id
//     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
//     */
//    public function show($team_id)
//    {
//        return $this->domain->teamIndex($team_id);
//    }
//
//    /**
//     * @param TeamFormRequest $request
//     * @return mixed
//     */
//    public function store(TeamFormRequest $request)
//    {
//        return $this->domain->teamRecord($request);
//    }
//
//    /**
//     * @param $team_id
//     * @param TeamFormRequest $request
//     * @return mixed
//     */
//    public function update($team_id, TeamFormRequest $request)
//    {
//        return $this->domain->teamUpdate($team_id, $request);
//    }
//
//    /**
//     * @param $team_id
//     * @return mixed
//     */
//    public function destroy($team_id)
//    {
//        return $this->domain->teamDelete($team_id);
//    }
//
//    /**
//     * @return mixed
//     */
//    public function sitemap()
//    {
//        return $this->domain->teamsSitemap();
//    }
}
