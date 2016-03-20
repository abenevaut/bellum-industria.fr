<?php namespace Modules\Users\Outputters;

use Config;
use App\Http\Front\Outputters\FrontOutputter;

class AuthOutputter extends FrontOutputter
{
    public function __construct()
    {
        $this->set_current_module('users');
    }
}