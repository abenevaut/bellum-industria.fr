<?php namespace Core\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController;
use Core\Http\Outputters\Admin\SettingsOutputter;
use Core\Http\Requests\Admin\SettingsStoreFormRequest;

/**
 * Class SettingsController
 * @package Core\Http\Controllers\Admin
 */
class SettingsController extends CoreAdminController
{
	/**
	 * @var SettingsOutputter|null
	 */
	protected $outputter = null;

	/**
	 * SettingsController constructor.
	 *
	 * @param SettingsOutputter $outputter
	 */
	public function __construct(SettingsOutputter $outputter)
	{
		parent::__construct();
		$this->outputter = $outputter;
	}

	/**
	 * @return mixed
	 */
	public function index()
	{
		return $this->outputter->index();
	}

	/**
	 * @return mixed
	 */
	public function store(SettingsStoreFormRequest $request)
	{
		return $this->outputter->store($request);
	}
}
