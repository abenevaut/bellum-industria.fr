<?php namespace Modules\Users\Widgets;

use Widget;
use CVEPDB\Contracts\Widgets;
use Modules\Users\Repositories\UserRepositoryEloquent;

class ExportUsers implements Widgets
{
	/**
	 * @var string Widget title
	 */
	protected $title = 'Export users';

	/**
	 * @var string Widget description
	 */
	protected $description = 'Export a users list to excel file';

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
				return $this->output('users.widgets.exportusers');
		}
	}
}
