<?php

namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;

class DashboardController extends ControllerAbstract
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return view(
			'backend.dashboard.index',
			[
			]
		);
	}
}
