<?php namespace Modules\Users\Widgets;

use Illuminate\Support\Facades\Auth;
use Widget;
use CVEPDB\Contracts\Widgets;
use Modules\Users\Repositories\UserRepositoryEloquent;

class ProfileUsers implements Widgets
{
	/**
	 * @var string Widget title
	 */
	protected $title = 'Profile users';

	/**
	 * @var string Widget description
	 */
	protected $description = 'Display a users profile in the dashboard';

	/**
	 * @var string View namespace ('dashboard::'|null)
	 */
	protected $view_prefix = 'users::';

	/**
	 * @var string
	 */
	protected $module = 'users::';

	/**
	 * @var UserRepositoryEloquent|null
	 */
	private $r_user = null;

	public function __construct(UserRepositoryEloquent $r_user)
	{
		$this->r_user = $r_user;
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitlte()
	{
		return $this->title;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setModuleName($module_name)
	{
		$this->module = $module_name . '::';
	}

	public function getModuleName()
	{
		return $this->module;
	}

	public function output($view, $data = [])
	{
		return cmsview($view, $data, $this->view_prefix, $this->module);
	}

	public function widgetInformation()
	{
		return [
			'title' => $this->getTitlte(),
			'description' => $this->getDescription(),
		];
	}

	public function register($action = null)
	{
		switch ($action) {
			case 'info': {
				return $this->widgetInformation();
			}
			default:
			{
				$user = $this->r_user->find(Auth::user()->id);

				return $this->output('users.widgets.profileusers', ['user' => $user]);
			}
		}
	}
}
