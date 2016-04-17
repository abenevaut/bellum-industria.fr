<?php namespace Modules\Files\Http\Controllers\Admin;

use Illuminate\Foundation\Application;
use Barryvdh\Elfinder\ElfinderController;
use Modules\Files\Outputters\Admin\FilesOutputter;
use Barryvdh\Elfinder\Session\LaravelSession;
use Barryvdh\Elfinder\Connector;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Request;

/**
 * Class AdminFilesController
 * @package Modules\Files\Http\Controllers\Admin
 */
class FilesController extends ElfinderController
{
    /**
     * @var FilesOutputter|null
     */
    protected $outputter = null;

    /**
     * @param FilesOutputter $outputter
     */
    public function __construct(Application $app, FilesOutputter $outputter)
    {
        parent::__construct($app);
        $this->outputter = $outputter;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->outputter->index();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function config()
    {
        return $this->outputter->edit();
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTinyMCE4()
    {
        return $this->outputter->showTinyMCE4();
    }

    /**
     * @param $input_id
     * @return mixed
     */
    public function showPopup($input_id)
    {
        return $this->app['view']
            ->make($this->package . '::standalonepopup')
            ->with($this->getViewVars())
            ->with(compact('input_id'));
    }

    /**
     * @param $input_id
     * @return mixed
     */
    public function showFilePicker($input_id)
    {
        $type = Request::input('type');
        return $this->app['view']
            ->make($this->package . '::filepicker')
            ->with($this->getViewVars())
            ->with(compact('input_id','type'));
    }

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showConnector()
    {
        $roots = $this->app->config->get('elfinder.roots', []);

        if (empty($roots)) {
            $dirs = (array) $this->app['config']->get('elfinder.dir', []);

            foreach ($dirs as $dir) {
                $roots[] = [
                    'driver' => 'LocalFileSystem', // driver for accessing file system (REQUIRED)
                    'path' => public_path($dir), // path to files (REQUIRED)
                    'URL' => url($dir), // URL to files (REQUIRED)
                    'accessControl' => $this->app->config->get('elfinder.access') // filter callback (OPTIONAL)
                ];
            }

            $disks = (array) $this->app['config']->get('elfinder.disks', []);
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

        $opts = $this->app->config->get('elfinder.options', array());
        $opts = array_merge(['roots' => $roots, 'session' => $session], $opts);

        // run elFinder
        $connector = new Connector(new \elFinder($opts));
        $connector->run();
        return $connector->getResponse();
    }
}