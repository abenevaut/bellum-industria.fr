<?php namespace Modules\Users\Http\Outputters\Admin;

use Config;
use Core\Http\Outputters\AdminOutputter;

class AuthOutputter extends AdminOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'users::login.backend_meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'users::login.backend_meta_description';

    public function __construct()
    {
        parent::__construct();
        $this->set_current_module('users');
    }
}