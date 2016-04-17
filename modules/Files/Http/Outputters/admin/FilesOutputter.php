<?php namespace Modules\Files\Outputters\Admin;

use Widget;
use Core\Http\Outputters\AdminOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;
use CVEPDB\Abstracts\Http\Requests\FormRequest as IFormRequest;

/**
 * Class FilesOutputter
 * @package Modules\Files\Outputters\Admin
 */
class FilesOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'files::admin.meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'files::admin.meta_description';

    public function __construct(
        SettingsRepository $r_settings
    )
    {
        parent::__construct($r_settings);
        $this->set_current_module('files');
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
                'locale' => \Session::get('lang')
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
                'locale' => \Session::get('lang')
            ]
        );
    }
}
