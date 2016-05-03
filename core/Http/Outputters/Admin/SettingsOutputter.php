<?php namespace Core\Http\Outputters\Admin;

use Config;
use Menu;
use Module;
use Request;
use Response;
use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use CVEPDB\Abstracts\Http\Requests\FormRequest as AbsFormRequest;

/**
 * Class SettingsOutputter
 * @package Core\Http\Outputters
 */
class SettingsOutputter extends AdminOutputter
{
	/**
	 * @var string Outputter header title
	 */
	protected $title = 'global.settings';

	private $form_key_to_settings = [
		'core_site_name' => 'core.site.name',
		'core_site_description' => 'core.site.description',

		'mail_from_address' => 'mail.from.address',
		'mail_from_name' => 'mail.from.name',
		'core_mail_mailwatch' => 'core.mail.mailwatch',

		'mail_driver' => 'mail.driver',
		'mail_host' => 'mail.host',
		'mail_port' => 'mail.port',
		'mail_encryption' => 'mail.encryption',
		'mail_username' => 'mail.username',
		'mail_password' => 'mail.password',

		'filesystems_disks_dropbox_appSecret' => 'filesystems.disks.dropbox.appSecret',
		'filesystems_disks_dropbox_accessToken' => 'filesystems.disks.dropbox.accessToken',

		'filesystems_disks_s3_key' => 'filesystems.disks.s3.key',
		'filesystems_disks_s3_secret' => 'filesystems.disks.s3.secret',
		'filesystems_disks_s3_region' => 'filesystems.disks.s3.region',
		'filesystems_disks_s3_bucket' => 'filesystems.disks.s3.bucket',

		'services_bitbucket_client_id' => 'services.bitbucket.client_id',
		'services_bitbucket_client_secret' => 'services.bitbucket.client_secret',

		'services_facebook_client_id' => 'services.facebook.client_id',
		'services_facebook_client_secret' => 'services.facebook.client_secret',

		'services_github_client_id' => 'services.github.client_id',
		'services_github_client_secret' => 'services.github.client_secret',

		'services_google_client_id' => 'services.google.client_id',
		'services_google_client_secret' => 'services.google.client_secret',

		'services_linkedin_client_id' => 'services.linkedin.client_id',
		'services_linkedin_client_secret' => 'services.linkedin.client_secret',

		'services_twitter_client_id' => 'services.twitter.client_id',
		'services_twitter_client_secret' => 'services.twitter.client_secret',
	];

	/**
	 * @var string Outputter header description
	 */
	protected $description = '';

	public function __construct(SettingsRepository $r_settings)
	{
		parent::__construct($r_settings);
		$this->addBreadcrumb(trans('global.settings'), 'admin/settings');
	}

	public function index()
	{
		return $this->output(
			'core.admin.settings.index',
			[
				'settings' => $this->r_settings
			]
		);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function store(AbsFormRequest $request)
	{
		$posts = $request->all();
		unset($posts['_token']);

		foreach ($posts as $key => $value) {
			$setting_key = $this->getSettingKey($key);
			$this->r_settings->set($setting_key, $value);
		}
		return $this->redirectTo('admin/settings');
	}

	/**
	 * @param AbsFormRequest $request
	 * @return mixed
	 */
	public function get(AbsFormRequest $request)
	{
		$data = [];
		if (Request::ajax()) {
			$setting_key = $request->get('setting_key');
			$data[$setting_key] = $this->r_settings->get($setting_key);
		}
		return Response::json($data);
	}

	/**
	 * @param AbsFormRequest $request
	 * @return mixed
	 */
	public function set(AbsFormRequest $request)
	{
		$data = [];
		if (Request::ajax()) {
			$setting_key = $request->get('setting_key');
			$setting_value = $request->get('setting_value');
			$this->r_settings->set($setting_key, $setting_value);
			$data[$setting_key] = $setting_value;
		}
		return Response::json($data);
	}

	private function getSettingKey($form_key)
	{
		return $this->form_key_to_settings[$form_key];
	}
}
