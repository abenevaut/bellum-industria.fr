<?php

namespace App\CVEPDB\Multigaming\Controllers;

use App;
use URL;
use Auth;
use Session;

use App\CVEPDB\Multigaming\Controllers\Abs\AbsBaseController as BaseController;
use App\CVEPDB\Multigaming\Repositories\TeamRepository as TeamRepository;
use App\CVEPDB\Multigaming\Requests\TeamFormRequest as TeamFormRequest;

/**
 * Class TeamController
 * @package App\CVEPDB\Multigaming\Controllers
 */
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
     * @param TeamFormRequest $request
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
            ->with('message', 'The team was successfully added!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @param $team_id
     * @param TeamFormRequest $request
     * @return mixed
     */
    public function putStoreTeam($team_id, TeamFormRequest $request)
    {
        if (!Auth::check()) {
            redirect('multigaming');
        }

        $team = $this->teams->find($team_id);

        $this->teams->update(
            $team,
            [
                'name' => $request->get('name')
            ]
        );

        return \Redirect::route('teams')
            ->with('message', 'The team was successfully edited!')
            ->with('alert-class', 'download-box');
    }

    /**
     * @param $team_id
     * @return mixed
     */
    public function deleteRemoveTeam($team_id)
    {
        if (!Auth::check()) {
            redirect('multigaming');
        }

        $this->teams->deleteById($team_id);

        return \Redirect::route('teams')
            ->with('message', 'The team was successfully removed!')
            ->with('alert-class', 'download-box');
    }

    public function getSitemap()
    {
        // create new sitemap object
        $sitemap = App::make("sitemap");

        // get all products from db (or wherever you store them)
        $teams = $this->teams->all();

        // counters
        $counter = 0;
        $sitemapCounter = 0;

        // add every product to multiple sitemaps with one sitemapindex
        foreach ($teams as $team)
        {
            if ($counter < 50000)
            {
                // add product to items array
                $sitemap->add(
                    $loc = url('multigaming/teams/show/' . $team->id),
                    $lastmod = $team->updated_at,
                    $priority = null,
                    $freq = null,
                    $images = null,
                    $title = $team->name,
                    $translations = null,
                    $videos = null,
                    $googlenews = null,
                    $alternates  = null
                );
                // count number of elements
                $counter++;
            }
            else
            {
                // generate new sitemap file
                $sitemap->store('xml','sitemap-multigaming-teams-' . $sitemapCounter);
                // add the file to the sitemaps array
                $sitemap->addSitemap(url('sitemap-multigaming-teams-' . $sitemapCounter . '.xml'));
                // reset items array (clear memory)
                $sitemap->model->resetItems();
                // reset the counter
                $counter = 0;
                // count generated sitemap
                $sitemapCounter++;
            }
        }

        // you need to check for unused items
        if (!empty($sitemap->model->getItems()))
        {
            // generate sitemap with last items
            $sitemap->store('xml','sitemap-multigaming-teams-' . $sitemapCounter);
            // add sitemap to sitemaps array
            $sitemap->addSitemap(url('sitemap-multigaming-teams-' . $sitemapCounter.'.xml'));
            // reset items array
            $sitemap->model->resetItems();
        }

        $sitemap->setCache('laravel.sitemap-multigaming-teams', 3600);

        // generate new sitemapindex that will contain all generated sitemaps above
        return $sitemap->render('sitemapindex','sitemap');
    }
}
