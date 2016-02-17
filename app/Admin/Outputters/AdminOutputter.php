<?php

namespace App\Admin\Outputters;

use App;
use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use CVEPDB\Requests\IFormRequest;
use App\Admin\Repositories\Users\LogContactRepositoryEloquent;

class AdminOutputter extends AbsLaravelOutputter
{
    /**
     * @var LogContactRepositoryEloquent|null
     */
    private $r_contact = null;

    public function __construct()
    {
        parent::__construct();

        $this->r_contact = App::make('App\Admin\Repositories\Users\LogContactRepositoryEloquent');
    }

    public function output($view, $data)
    {
        return parent::output(
            $view,
            $data + $this->admin_data_sidebar()
        );
    }

    private function admin_data_sidebar()
    {
        return [
            'sidebar' => [
                'prospection' => [
                    'contact_pending' => $this->r_contact->findWhereIn('status', ['pending'])->count()
                ]
            ]
        ];
    }
}