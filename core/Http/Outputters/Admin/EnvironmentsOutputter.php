<?php namespace Core\Http\Outputters\Admin;

use CVEPDB\Abstracts\Http\Requests\FormRequest as AbsFormRequest;
use CVEPDB\Settings\Facades\Settings;
use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use Core\Domain\Environments\Presenters\EnvironmentListPresenter;

/**
 * Class EnvironmentsOutputter
 * @package Core\Http\Outputters\Admin
 */
class EnvironmentsOutputter extends AdminOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'environments.meta_title';

	/**
	 * @var string Outputter header description
	 */
	protected $description = 'environments.meta_description';

	/**
	 * @var array|mixed
	 */
	private $form_key_to_settings = [];

	/**
	 * @var EnvironmentRepositoryEloquent|null
	 */
	private $r_environment = null;

	/**
	 * EnvironmentsOutputter constructor.
	 *
	 * @param SettingsRepository            $r_settings
	 * @param EnvironmentRepositoryEloquent $r_environment
	 */
	public function __construct(
		SettingsRepository $r_settings,
		EnvironmentRepositoryEloquent $r_environment
	)
	{

		parent::__construct($r_settings);

		$this->r_environment = $r_environment;

		$this->addBreadcrumb(trans('global.environment_s'), 'admin/environments');
		$this->form_key_to_settings = config('settings.form_key_to_settings');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		$this->r_environment->setPresenter(new EnvironmentListPresenter());

		$envs = $this->r_environment
			->paginate(Settings::get('app.pagination'));

		return $this->output(
			'core.admin.environments.index',
			[
				'environments' => $envs
			]
		);
	}

	/**
	 * @param AbsFormRequest         $request
	 * @param LogoSettingsRepository $r_logo_settings
	 *
	 * @return mixed|\Redirect
	 */
	public function store(AbsFormRequest $request)
	{
		$this->r_environment->create([
			'name'      => $request->get('name'),
			'reference' => $request->get('reference'),
			'domain'    => $request->get('domain'),
		]);

		return $this->redirectTo('admin/environments');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function show($id)
	{
		$env = $this->r_environment->find($id);

		return $this->output(
			'core.admin.environments.show',
			[
				'environment' => $env
			]
		);
	}

	/**
	 * @param AbsFormRequest $request
	 * @param                $id
	 *
	 * @return mixed|\Redirect
	 */
	public function update(AbsFormRequest $request, $id)
	{
		$this->r_environment->update(
			[
				'name'      => $request->get('name'),
				'domain'    => $request->get('domain'),
			],
			$id
		);

		return $this->redirectTo('admin/environments');
	}

	/**
	 * @param $id
	 *
	 * @return mixed|\Redirect
	 */
	public function destroy($id)
	{
		$this->r_environment->delete($id);

		return $this->redirectTo('admin/environments');
	}
}
