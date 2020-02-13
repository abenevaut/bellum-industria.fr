<?php namespace bellumindustria\Http\Controllers\Ajax\Users;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Request\Ajax\Users\
{
	Profiles\IsSidebarPinedFormRequest
};
use bellumindustria\Domain\Users\Profiles\Repositories\ProfilesRepositoryEloquent;

class ProfilesController extends ControllerAbstract
{

	/**
	 * @var ProfilesRepositoryEloquent|null
	 */
	protected $r_profiles = null;

	/**
	 * @param ProfilesRepositoryEloquent $r_profiles
	 */
	public function __construct(ProfilesRepositoryEloquent $r_profiles)
	{
		$this->r_profiles = $r_profiles;

		$this->before();
	}

	/**
	 * Pin or unpin the sidebar for the current logged in user.
	 *
	 * @param IsSidebarPinedFormRequest $request
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function ajaxChangeSidebarPinStatus(IsSidebarPinedFormRequest $request)
	{
		return $this->r_profiles->ajaxChangeSidebarPinStatusJson($request);
	}
}
