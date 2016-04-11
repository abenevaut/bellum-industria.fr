<?php namespace Modules\Dashboard\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Dashboard\Http\Outputters\Admin\DashboardOutputter;
use Modules\Dashboard\Http\Requests\UpdateDashboardFormRequest;

/**
 * Class DashboardController
 * @package Modules\Dashboard\Http\Controllers\Admin
 */
class DashboardController extends Controller
{
    /**
     * @var DashboardOutputter|null
     */
    protected $outputter = null;

    /**
     * @param DashboardOutputter $outputter
     */
    public function __construct(DashboardOutputter $outputter)
    {
        parent::__construct();

        $this->outputter = $outputter;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->outputter->index();
    }

    /**
     * @param UpdateDashboardFormRequest $request
     * @return array
     */
    public function update(UpdateDashboardFormRequest $request)
    {
        return $this->outputter->update($request);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function settings()
    {
        return $this->outputter->edit();
    }
}
