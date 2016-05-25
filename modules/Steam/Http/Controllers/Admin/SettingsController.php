<?php namespace Modules\Steam\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Steam\Http\Outputters\Admin\SettingsOutputter;
use Modules\Steam\Http\Requests\SettingsUpdateFormRequest;

/**
 * Class SettingsController
 * @package Modules\Steam\Http\Controllers\Admin
 */
class SettingsController extends Controller
{
	/**
	 * @var SettingsOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @param SettingsOutputter $outputter
	 */
	public function __construct(SettingsOutputter $outputter)
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
	 * @param SettingsUpdateFormRequest $request
	 * @return array
	 */
	public function store(SettingsUpdateFormRequest $request)
	{
		return $this->outputter->store($request);
	}
}
