<?php namespace Modules\Files\Outputters;

use Widget;
use Core\Http\Outputters\AdminOutputter;
use CVEPDB\Contracts\Http\Requests\IFormRequest;
use Modules\Files\Repositories\FolderRepositoryEloquent;

class FilesOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'Files';

    /**
     * @var string Outputter header description
     */
    protected $description = 'media manager';

    /**
     * @var null FilesRepositoryEloquent
     */
    private $r_folders = null;

    public function __construct(
        FolderRepositoryEloquent $r_folders
    )
    {
        parent::__construct();

        $this->set_current_module('files');

        $this->r_folders = $r_folders;

        $this->addBreadcrumb('Files', 'files');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->output(
            'files.admin.index',
            [
                'locale' => 'en'
            ]
        );
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showTinyMCE4()
    {
        return $this->output(
            'files.admin.elfinder.tinymce4',
            [
                'locale' => 'en'
            ]
        );
    }
}