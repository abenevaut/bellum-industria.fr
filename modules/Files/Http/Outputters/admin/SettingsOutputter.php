<?php namespace Modules\Files\Http\Outputters\Admin;

use Core\Http\Outputters\AdminOutputter;
use Core\Http\Requests\FormRequest as IFormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;

/**
 * Class SettingsOutputter
 * @package Modules\Files\Http\Outputters\Admin
 */
class SettingsOutputter extends AdminOutputter
{
	/**
	 * @var string Outputter header title
	 */
	protected $title = 'files::admin.meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'global.settings';

	public function __construct(
	 SettingsRepository $r_settings
	) {
	
		parent::__construct($r_settings);
		$this->set_current_module('files');
		$this->addBreadcrumb(trans('global.settings'), 'admin/files/settings');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output(
	  'files.admin.settings.index',
	  [
	  ]
		);
	}

	/**
	 * @param IFormRequest $request
	 * @return array
	 */
	public function store(IFormRequest $request)
	{

		// elfinder.disks

		return $this->redirectTo('admin/files/settings');
	}
}
