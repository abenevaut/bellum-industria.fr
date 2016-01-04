<?php

namespace App\CVEPDB\Multigaming\Domains;

use App\CVEPDB\Multigaming\Repositories\ServerRepository as ServerRepository;
use App\CVEPDB\Multigaming\Outputters\IndexOutputter as indexOutputter;

/**
 * Class IndexDomain
 * @package App\CVEPDB\Multigaming\Domains
 */
class IndexDomain
{
    /**
     * @var ServerRepository|null
     */
    protected $servers = null;

    /**
     * @var IndexOutputter|null
     */
    protected $Outputter = null;

    public function __construct()
    {
        $this->servers = new ServerRepository;
        $this->Outputter = new IndexOutputter;

        $this->Outputter->addBreadcrumb('Home', '/');
        $this->Outputter->setBreadcrumbDivider('<i class="icon-right-dir"></i>');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function indexBoutique()
    {
        $this->Outputter->addBreadcrumb('Boutique', '/multigaming/boutique');
        return $this->Outputter->outputIndex([
            //
        ]);
    }
}
