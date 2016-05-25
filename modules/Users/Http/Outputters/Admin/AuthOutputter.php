<?php namespace Modules\Users\Http\Outputters\Admin;

use Config;
use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;

class AuthOutputter extends AdminOutputter
{
	/**
	 * @var string Outputter header title
	 */
	protected $title = 'users::login.backend_meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'users::login.backend_meta_description';

	public function __construct(SettingsRepository $r_settings)
	{
		parent::__construct($r_settings);
		$this->set_current_module('users');
	}
}
