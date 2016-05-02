<?php namespace Modules\Users\Http\Outputters\Admin;

use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class SettingsOutputter
 * @package Modules\Users\Http\Outputters\Admin
 */
class SettingsOutputter extends AdminOutputter
{
	/**
	 * @var string Outputter header title
	 */
	protected $title = 'users::admin.meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'users::admin.meta_description';

	public function __construct(
		SettingsRepository $_settings
	)
	{
		parent::__construct($_settings);
		$this->set_current_module('users');
		$this->addBreadcrumb('Settings', 'admin/users');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output(
			'users.admin.settings.index',
			[
			]
		);
	}
}
