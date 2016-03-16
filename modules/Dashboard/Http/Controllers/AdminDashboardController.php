<?php namespace Modules\Dashboard\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Dashboard\Outputters\DashboardOutputter;

class AdminDashboardController extends Controller {

	/**
	 * @var UserRepository|null
	 */
	protected $outputter = null;

	/**
	 * @param UserOutputter $outputter
	 */
	public function __construct(DashboardOutputter $outputter)
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

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function config()
	{
		return $this->outputter->edit();
	}
}