<?php

namespace App\CVEPDB\Interfaces\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\CVEPDB\Interfaces\Controllers\AbsBaseController as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class AbsController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
