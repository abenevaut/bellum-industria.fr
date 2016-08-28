<?php namespace cms\Http\Controllers\Backend;

use cms\Infrastructure\Abstractions\Controllers\BackendController;
use cms\Domain\Users\Permissions\Repositories\PermissionsRepositoryEloquent;
use cms\Domain\Users\Roles\Repositories\RolesRepositoryEloquent;
use cms\Domain\Environments\Environments\Repositories\EnvironmentsRepositoryEloquent;
use cms\Http\Requests\Backend\EnvironmentFormRequest;

/**
 * Class EnvironmentsController
 * @package cms\Http\Controllers\Backend
 */
class EnvironmentsController extends BackendController
{
	/**
	 * @var EnvironmentsRepositoryEloquent|null
	 */
	protected $r_environments = null;

	/**
	 * EnvironmentsController constructor.
	 *
	 * @param EnvironmentsRepositoryEloquent $r_environments
	 */
	public function __construct(EnvironmentsRepositoryEloquent $r_environments)
	{

		$this->middleware(
			'ability:' . RolesRepositoryEloquent::ADMIN . ',' . PermissionsRepositoryEloquent::SEE_ENVIRONMENT
		);

		if (!cmsuser_can_see_env())
		{
			abort(404);
		}

		$this->r_environments = $r_environments;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_environments->indexBackEnd();
	}

	/**
	 * @param EnvironmentFormRequest $request
	 *
	 * @return mixed|\Redirect
	 */
	public function store(EnvironmentFormRequest $request)
	{
		return $this->r_environments->storeBackEnd($request);
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
	{
		return $this->r_environments->editBackEnd($id);
	}

	/**
	 * @param EnvironmentFormRequest $request
	 * @param                        $id
	 *
	 * @return mixed|\Redirect
	 */
	public function update(EnvironmentFormRequest $request, $id)
	{
		return $this->r_environments->updateBackEnd($request, $id);
	}

	/**
	 * @param $id
	 *
	 * @return mixed
	 */
	public function destroy($id)
	{
		return $this->r_environments->destroyBackEnd($id);
	}
}
