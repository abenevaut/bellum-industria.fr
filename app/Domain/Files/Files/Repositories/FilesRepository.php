<?php namespace abenevaut\Domain\Files\Files\Repositories;

use Illuminate\Foundation\Application;
use Illuminate\Filesystem\FilesystemAdapter;
use Barryvdh\Elfinder\Session\LaravelSession;
use Barryvdh\Elfinder\Connector;

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
			$dirs = (array)$this->app['config']->get('elfinder.dir', []);
			foreach ($dirs as $dir) {
				$roots[] = [
					'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
					'path' => public_path($dir), // path to files (REQUIRED)
					'URL' => url($dir), // URL to files (REQUIRED)
					'accessControl' => $this->app->config->get('elfinder.access') // filter callback (OPTIONAL)
				];
			}

			$disks = (array)$this->app['config']->get('elfinder.disks', []);
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
					];
					$roots[] = array_merge($defaults, $root);
				}
			}
		}

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
