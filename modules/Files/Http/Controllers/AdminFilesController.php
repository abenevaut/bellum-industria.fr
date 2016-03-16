<?php namespace Modules\Files\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Files\Outputters\FilesOutputter;

class AdminFilesController extends Controller
{
    /**
     * @var UserRepository|null
     */
    protected $outputter = null;

    /**
     * @param FilesOutputter $outputter
     */
    public function __construct(FilesOutputter $outputter)
    {
        $this->outputter = $outputter;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return $this->outputter->index();
    }

    public function update(UpdateDashboardFormRequest $request)
    {
        return $this->outputter->update($request);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function config()
    {
        return $this->outputter->edit();
    }
}