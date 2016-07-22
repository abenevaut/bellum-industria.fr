<?php namespace cms\Http\Controllers\Backend;

use cms\Infrastructure\Abstractions\Controllers\BackendController;
use cms\Domain\Roles\Permissions\Repositories\PermissionsRepositoryEloquent;
use cms\Domain\Roles\Roles\Repositories\RolesRepositoryEloquent;

use cms\Http\Outputters\Admin\EnvironmentsOutputter;
use cms\Http\Requests\Admin\EnvironmentFormRequest;
use cms\Http\Requests\Admin\SettingsStoreFormRequest;

/**
 * Class EnvironmentsController
 * @package cms\Http\Controllers\Backend
 */
class EnvironmentsController extends BackendController
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
	public function edit($id)
	{
		return $this->outputter->edit($id);
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
