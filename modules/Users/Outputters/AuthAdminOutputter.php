<?php namespace Modules\Users\Outputters;

use Config;
use App\Http\Admin\Outputters\AdminOutputter;

class AuthAdminOutputter extends AdminOutputter
{
    public function __construct()
    {
        parent::__construct();
        $this->set_current_module('users');
    }
}