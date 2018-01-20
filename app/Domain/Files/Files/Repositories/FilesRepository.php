<?php namespace bellumindustria\Domain\Files\Files\Repositories;

use bellumindustria\Domain\Users\Users\User;
use Illuminate\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Barryvdh\Elfinder\Session\LaravelSession;
use Barryvdh\Elfinder\Connector;

//include_once base_path('vendor/studio-42/elfinder/php/elFinderVolumeMySQL.class.php');
include_once base_path('vendor/studio-42/elfinder/php/elFinderVolumeFTP.class.php');
//include_once base_path('vendor/studio-42/elfinder/php/elFinderVolumeDropbox.class.php');
//include_once base_path('vendor/studio-42/elfinder/php/elFinderVolumeGoogleDrive.class.php');
//include_once base_path('vendor/studio-42/elfinder/php/elFinderVolumeBox.class.php');
//include_once base_path('vendor/studio-42/elfinder/php/elFinderVolumeOneDrive.class.php');

define('ELFINDER_DROPBOX_CONSUMERKEY', '');
define('ELFINDER_DROPBOX_CONSUMERSECRET', '');
define('ELFINDER_DROPBOX_META_CACHE_PATH', '');

define('ELFINDER_GOOGLEDRIVE_CLIENTID', '');
define('ELFINDER_GOOGLEDRIVE_CLIENTSECRET', '');

define('ELFINDER_BOX_CLIENTID', '');
define('ELFINDER_BOX_CLIENTSECRET', '');

class FilesRepository
{

	/**
	 * The application instance.
	 *
	 * @var Application
	 */
	protected $app;

	/**
	 * @var string
	 */
	protected $package = 'elfinder';

	/**
	 * FilesRepository constructor.
	 */
	public function __construct()
	{
		$this->app = app();
	}

	/**
	 * @return mixed
	 */
	public function backendShowIndexView()
	{
		return view('backend.files.files.index', $this->getViewVars());
	}

	/**
	 * @return mixed
	 */
	public function accountantShowIndexView()
	{
		return view('accountant.files.files.index', $this->getViewVars());
	}

	/**
	 * @return mixed
	 */
	public function backendShowCKeditor4()
	{
		return view($this->package . '::ckeditor4', $this->getViewVars());
	}

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function backendShowConnector()
	{
		$roots = $this->app->config->get('elfinder.roots', []);

		if (empty($roots)) {
			$roots = array_merge($roots, $this->listElFinderDirectories());
			$roots = array_merge($roots, $this->listElFinderDisks('elfinder.disks.' . User::ROLE_ADMINISTRATOR));
		}

		return $this->generateElFinderFilesManagerConnector($roots);
	}

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function accountantShowConnector()
	{
		$roots = $this->app->config->get('elfinder.roots', []);

		if (empty($roots)) {
			$roots = array_merge($roots, $this->listElFinderDirectories());
			$roots = array_merge($roots, $this->listElFinderDisks('elfinder.disks.' . User::ROLE_ACCOUNTANT));
		}

		return $this->generateElFinderFilesManagerConnector($roots);
	}

	protected function listElFinderDirectories($config = 'elfinder.dir')
	{
		$roots = [];
		$dirs = (array)$this->app['config']->get($config, []);

		foreach ($dirs as $dir) {
			$roots[] = [
				'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
				'path' => public_path($dir), // path to files (REQUIRED)
				'URL' => url($dir), // URL to files (REQUIRED)
				'accessControl' => $this->app->config->get('elfinder.access') // filter callback (OPTIONAL)
			];
		}

		return $roots;
	}

	protected function listElFinderDisks($config = 'elfinder.disks.' . User::ROLE_ADMINISTRATOR)
	{
		$roots = [];
		$disks = (array)$this->app['config']->get($config, []);

		foreach ($disks as $key => $root) {
			if (is_string($root)) {
				$key = $root;
				$root = [];
			}
			$disk = app('filesystem')->disk($key);
			if ($disk instanceof FilesystemAdapter) {
				$defaults = [
					'driver' => 'Flysystem',
					'filesystem' => $disk->getDriver(),
					'alias' => $key,
					'accessControl' => $this->app->config->get('elfinder.access')
				];
				$roots[] = array_merge($defaults, $root);
			}
		}

		return $roots;
	}

	/**
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	protected function generateElFinderFilesManagerConnector($roots = [])
	{
		if (app()->bound('session.store')) {
			$sessionStore = app('session.store');
			$session = new LaravelSession($sessionStore);
		} else {
			$session = null;
		}

		$rootOptions = $this->app->config->get('elfinder.root_options', array());
		foreach ($roots as $key => $root) {
			$roots[$key] = array_merge($rootOptions, $root);
		}

		$opts = $this->app->config->get('elfinder.options', array());
		$opts = array_merge($opts, ['roots' => $roots, 'session' => $session]);

		// run elFinder
		$connector = new Connector(new \elFinder($opts));
		$connector->run();

		return $connector->getResponse();
	}

	/**
	 * @return array
	 */
	protected function getViewVars()
	{
		$csrf = true;
		$dir = 'packages/barryvdh/' . $this->package;
		$locale = str_replace("-", "_", $this->app->config->get('app.locale'));

		if (!file_exists($this->app['path.public'] . "/$dir/js/i18n/elfinder.$locale.js")) {
			$locale = false;
		}

		return compact('dir', 'locale', 'csrf');
	}
}
