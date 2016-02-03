<?php

namespace App\CVEPDB\Vitrine\Outputters;

use App\CVEPDB\Interfaces\Outputters\AbsLaravelOutputter;
use App\CVEPDB\Vitrine\Outputters\SitemapFormats\SimplePageFormat;

class SimplePageOutputter extends AbsLaravelOutputter
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexIndex($data)
    {
        return $this->output('cvepdb.multigaming.teams.index', $data);
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
    public function generateIndexSitemap($uris)
    {
        return $this->generateSitemap(
            new SimplePageFormat,
            $uris,
            '',
            'sitemap-vitrine-pages-',
            'sitemap-vitrine-pages'
        );
    }
}