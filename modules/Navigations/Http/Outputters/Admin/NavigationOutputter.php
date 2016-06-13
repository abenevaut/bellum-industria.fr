<?php namespace Modules\Navigations\Http\Outputters\Admin;

use Config;
use Core\Http\Outputters\AdminOutputter;
use CVEPDB\Abstracts\Http\Requests\FormRequest as IFormRequest;
use Modules\Navigations\Repositories\SettingsRepository;

/**
 * Class NavigationOutputter
 * @package Modules\Navigations\Http\Outputters
 */
class NavigationOutputter extends AdminOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'navigations::admin.navigations.meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'navigations::admin.navigations.meta_description';

	/**
	 * NavigationOutputter constructor.
	 *
	 * @param SettingsRepository $r_settings
	 */
	public function __construct(SettingsRepository $r_settings)
	{
		parent::__construct($r_settings);
		$this->set_current_module('navigations');
		$this->addBreadcrumb(trans('global.settings'), 'admin/navigations');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output(
			'navigations.admin.index',
			[
			]
		);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int $id
	 *
	 * @return Response
	 */
	public function update($id, IFormRequest $request)
	{

		$type = $request->get('type');

		//$this->r_themes->update($id, $type);


		return redirect('admin/navigations');
	}
}
