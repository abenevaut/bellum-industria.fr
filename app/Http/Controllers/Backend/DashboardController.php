<?php

namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Dashboard\Dashboard\Repositories\DashboardRepository;

class DashboardController extends ControllerAbstract
{

	/**
	 * @var DashboardRepository|null
	 */
	protected $r_dashboard = null;

	/**
	 * DashboardController constructor.
	 *
	 * @param DashboardRepository $r_dashboard
	 */
	public function __construct(DashboardRepository $r_dashboard)
	{
		$this->r_dashboard = $r_dashboard;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_dashboard->backendShowDashboardIndexView();
	}
}
