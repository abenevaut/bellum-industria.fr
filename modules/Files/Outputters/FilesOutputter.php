<?php namespace Modules\Files\Outputters;

use Widget;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
use Modules\Files\Repositories\FilesRepositoryEloquent;

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
    private $r_files = null;

    public function __construct(
        FilesRepositoryEloquent $r_files
    )
    {
        parent::__construct();

        $this->r_files = $r_files;

        $this->addBreadcrumb('Files', 'admin/files');

        //$this->set_view_prefix('files::');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {


        return $this->output(
            'files.admin.index',
            [

            ]
        );
    }

    public function update(IFormRequest $request)
    {

    }
}