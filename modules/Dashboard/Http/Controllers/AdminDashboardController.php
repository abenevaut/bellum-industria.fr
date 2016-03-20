<?php namespace Modules\Dashboard\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Dashboard\Outputters\AdminDashboardOutputter;
use Modules\Dashboard\Requests\UpdateDashboardFormRequest;

class AdminDashboardController extends Controller {

	/**
	 * @var AdminDashboardOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @param AdminDashboardOutputter $outputter
	 */
	public function __construct(AdminDashboardOutputter $outputter)
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

	public function update(UpdateDashboardFormRequest $request)
	{
		return $this->outputter->update($request);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function config()
	{
		return $this->outputter->edit();
	}
}