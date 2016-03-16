<?php namespace Modules\Dashboard\Http\Controllers;

use Widget;
use Pingpong\Modules\Routing\Controller;
use App\Http\Admin\Outputters\AdminOutputter;



class AdminDashboardController extends Controller {

	/**
	 * @var UserRepository|null
	 */
	protected $outputter = null;

	/**
	 * @param UserOutputter $outputter
	 */
	public function __construct(AdminOutputter $outputter)
	{
		$this->outputter = $outputter;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{



		dd(  Widget::life()  );

		return $this->outputter->output('dashboard::dashboard.admin.index', []);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function config()
	{
		return $this->outputter->output('dashboard::dashboard.admin.config', []);
	}
}