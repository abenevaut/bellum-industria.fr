<?php namespace Core\Http\Controllers\Admin;

use Core\Domain\Roles\Repositories\PermissionRepositoryEloquent;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;
use Core\Http\Controllers\CoreAdminController;
use Core\Http\Outputters\Admin\EnvironmentsOutputter;
use Core\Http\Requests\Admin\EnvironmentFormRequest;
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
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->outputter->index();
	}

	/**
	 * @param EnvironmentFormRequest $request
	 *
	 * @return mixed|\Redirect
	 */
	public function store(EnvironmentFormRequest $request)
	{
		return $this->outputter->store($request);
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		return $this->outputter->show($id);
	}

	/**
	 * @param EnvironmentFormRequest $request
	 * @param                        $id
	 *
	 * @return mixed|\Redirect
	 */
	public function update(EnvironmentFormRequest $request, $id)
	{
		return $this->outputter->update($request, $id);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function destroy($id)
	{
		return $this->outputter->destroy($id);
	}
}
