<?php namespace Modules\Navigations\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Navigations\Http\Outputters\Admin\NavigationOutputter;
use Modules\Navigations\Http\Requests\UpdateNavigationFormRequest;

/**
 * Class AdminThemesController
 * @package Modules\Themes\Http\Controllers
 */
class NavigationController extends Controller
{

	/**
	 * @var NavigationOutputter|null
	 */
	private $outputter = null;

	/**
	 * NavigationController constructor.
	 *
	 * @param NavigationOutputter $outputter
	 */
	public function __construct(NavigationOutputter $outputter)
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
	 * @param                              $id
	 * @param UpdateNavigationFormRequest $request
	 *
	 * @return mixed
	 */
	public function update($id, UpdateNavigationFormRequest $request)
	{
		return $this->outputter->update($id, $request);
	}
}
