<?php namespace Core\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

/**
 * Class CoreAuthController
 * @package Core\Http\Controllers
 */
class CoreAuthController extends CoreController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Create a new authentication controller instance.
     */
    public function __construct()
    {
        parent::__construct();
    }
}
