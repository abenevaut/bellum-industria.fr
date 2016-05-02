<?php namespace Modules\Users\Http\Outputters;

use Config;
use Core\Http\Outputters\FrontOutputter;
use Core\Domain\Settings\Repositories\SettingsRepository;

class PasswordOutputter extends FrontOutputter
{
    /**
     * @var string Outputter header title
     */
    protected $title = 'users::password.frontend_meta_title';

    /**
     * @var string Outputter header description
     */
    protected $description = 'users::password.frontend_meta_description';

    public function __construct(SettingsRepository $r_settings)
    {
        parent::__construct($r_settings);
        $this->set_current_module('users');
    }
}