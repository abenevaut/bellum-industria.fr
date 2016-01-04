<?php

namespace App\CVEPDB\Multigaming\Outputters;

use App\CVEPDB\Interfaces\Outputters\AbsLaravelOutputter;

class IndexOutputter extends AbsLaravelOutputter
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function outputIndex($data)
    {
        return $this->output('cvepdb.multigaming.index', $data);
    }

    /**
     * @param $data
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function outputBoutique($data)
    {
        return $this->output('cvepdb.multigaming.boutique', $data);
    }
}