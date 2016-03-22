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
//        $p1 = $this->r_folders->find(4);
//        $p2 = $this->r_folders->find(5);
//
//        $f1 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test';
//        $f2 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test.jpg';
//        $f3 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test.pdf';
//        $f4 = '/Users/42antoine/Projects/cvepdb/laravel-cms/modules/Files/vendor/spatie/laravel-medialibrary/resources/testfiles/test.txt';


//        $this->r_folders->recordFileToPublic($p2, $f3, FolderRepositoryEloquent::DEFAULT_COLLECTION, true);

//        $p2->addMedia($f2)
//            ->preservingOriginal()
//            ->toMediaLibrary();

//        $url = 'http://cavaencoreparlerdebits.fr/addons/shared_addons/themes/longwave/img/logo.png';
//        $p2->addMediaFromUrl($url)
//            ->toMediaLibrary();

//        $mediaItems = $p2->getMedia();
//
//        $publicUrl = $mediaItems[1]->getUrl();
//        $fullPathOnDisk = $mediaItems[1]->getPath();

//        dd( $publicUrl );

        return $this->output(
            'files.admin.index',
            [
                'folders' => $this->r_folders->findWhereIn('folder_id', [0])
            ]
        );
    }

    public function update(IFormRequest $request)
    {

    }
}