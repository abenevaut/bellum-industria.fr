<?php namespace Modules\Files\Http\Controllers\Admin;

use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Files\Http\Outputters\Admin\SettingsOutputter;
use Modules\Files\Http\Requests\UpdateFilesSettingsFormRequest;

/**
 * Class SettingsController
 * @package Modules\Files\Http\Controllers\Admin
 */
class SettingsController extends Controller
{
    /**
     * @var SettingsOutputter|null
     */
    protected $outputter = null;

    /**
     * @param SettingsOutputter $outputter
     */
    public function __construct(SettingsOutputter $outputter)
    {
        parent::__construct();
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
     * @param UpdateFilesSettingsFormRequest $request
     * @return array
     */
    public function store(UpdateFilesSettingsFormRequest $request)
    {
        return $this->outputter->store($request);
    }
}
