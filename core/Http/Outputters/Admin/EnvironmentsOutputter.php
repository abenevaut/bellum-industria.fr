<?php namespace Core\Http\Outputters\Admin;

use Illuminate\Support\Facades\Auth;
use CVEPDB\Abstracts\Http\Requests\FormRequest as AbsFormRequest;
use CVEPDB\Settings\Facades\Settings;
use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use Core\Domain\Environments\Repositories\EnvironmentRepositoryEloquent;
use Core\Domain\Environments\Presenters\EnvironmentListPresenter;
use Core\Domain\Roles\Repositories\RoleRepositoryEloquent;

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
	 * @param AbsFormRequest $request
	 *
	 * @return mixed|\Redirect
	 */
	public function store(AbsFormRequest $request)
	{
		$environment = $this->r_environment->create([
			'name'      => $request->get('name'),
			'reference' => $request->get('reference'),
			'domain'    => $request->get('domain'),
		]);

		$this->r_environment->link_users_with(
			$environment,
			[
				Auth::user()->id
			]
		);

		return $this->redirectTo('admin/environments')
			->with('message-success', 'environments.index.modal.add.message.success');
	}

	/**
	 * @param $id
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function edit($id)
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
				'name'   => $request->get('name'),
				'domain' => $request->get('domain'),
			],
			$id
		);

		return $this->redirectTo('admin/environments')
			->with('message-success', 'environments.index.modal.update.message.success');
	}

	/**
	 * @param $id
	 *
	 * @return mixed|\Redirect
	 */
	public function destroy($id)
	{
		$redirectTo = null;

		try
		{
			$this->r_environment->delete($id);

			$redirectTo = $this->redirectTo('admin/environments')
				->with('message-success', 'environments.index.modal.delete.message.success');
		}
		catch (\Exception $e)
		{
			switch ($e->getCode())
			{
				case 1:
				{
					$redirectTo = $this->redirectTo('admin/environments')
						->with('message-error', $e->getMessage());
					break;
				}
				default: {
					$redirectTo = $this->redirectTo('admin/environments')
						->with('message-error', 'An error occured');
					break;
				}
			}
		}

		return $redirectTo;
	}
}
