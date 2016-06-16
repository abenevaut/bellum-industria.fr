<?php namespace Core\Http\Controllers\Admin;

use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Core\Http\Controllers\CoreAdminController;
use Core\Http\Outputters\Admin\EnvironmentsOutputter;
use Core\Http\Requests\Admin\SettingsStoreFormRequest;

/**
 * Class EnvironmentsController
 * @package Core\Http\Controllers\Admin
 */
class EnvironmentsController extends CoreAdminController
{
	/**
	 * @var SettingsOutputter|null
	 */
	protected $outputter = null;

	/**
	 * SettingsController constructor.
	 *
	 * @param EnvironmentsOutputter $outputter
	 */
	public function __construct(EnvironmentsOutputter $outputter)
	{
		parent::__construct();

		$this->middleware('ability:' . RoleRepositoryEloquent::ADMIN . ',' . PermissionRepositoryEloquent::SEE_ENVIRONMENT);

		if (!cmsuser_can_see_env())
		{
			abort(404);
		}

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
