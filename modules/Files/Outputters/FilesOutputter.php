<?php namespace Modules\Files\Outputters;

use Widget;
use App\Http\Admin\Outputters\AdminOutputter;
use CVEPDB\Requests\IFormRequest;
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

        $this->r_folders = $r_folders;

        $this->addBreadcrumb('Files', 'admin/files');

        //$this->set_view_prefix('files::');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $p1 = $this->r_folders->find(4);
        $p2 = $this->r_folders->find(5);

        $f1 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test';
        $f2 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test.jpg';
        $f3 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test.pdf';
        $f4 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test.txt';


        $p1->addMedia($f1)
            ->toMediaLibrary();


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