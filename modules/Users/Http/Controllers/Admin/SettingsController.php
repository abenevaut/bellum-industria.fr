<?php namespace Modules\Users\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Users\Http\Requests\UpdateUsersSettingsFormRequest;
use Modules\Users\Http\Outputters\Admin\SettingsOutputter;

/**
 * Class AdminUsersController
 * @package Modules\Users\Http\Controllers
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
	 * @param UpdateUsersSettingsFormRequest $request
	 *
	 * @return array
	 */
	public function store(UpdateUsersSettingsFormRequest $request)
	{
		return $this->outputter->store($request);
	}
}