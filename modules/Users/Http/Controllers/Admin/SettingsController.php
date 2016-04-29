<?php namespace Modules\Users\Http\Controllers\Admin;

use Request;
use Core\Http\Controllers\CoreAdminController as Controller;
use Modules\Users\Http\Outputters\Admin\UserOutputter;
use Modules\Users\Http\Requests\UsersFilteredFormRequest;

/**
 * Class AdminUsersController
 * @package Modules\Users\Http\Controllers
 */
class SettingsController extends Controller
{

    /**
     * @var UserOutputter|null
     */
    protected $outputter = null;

    /**
     * @param UserOutputter $outputter
     */
    public function __construct(UserOutputter $outputter)
    {
        parent::__construct();
        $this->outputter = $outputter;
    }

    /**
     * @param UsersFilteredFormRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UsersFilteredFormRequest $request)
    {
        return '';//$this->outputter->index($request, Request::ajax());
    }
}