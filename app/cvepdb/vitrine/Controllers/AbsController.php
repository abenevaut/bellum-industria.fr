<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\CVEPDB\Vitrine\Controllers\AbsBaseController as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class AbsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
