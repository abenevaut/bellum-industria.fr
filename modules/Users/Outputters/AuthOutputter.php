<?php namespace Modules\Users\Outputters;

use Config;
use App\Http\Front\Outputters\FrontOutputter;

class AuthOutputter extends FrontOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'users::login.frontend_meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'users::login.frontend_meta_description';

    public function __construct()
    {
        $this->set_current_module('users');
    }
}