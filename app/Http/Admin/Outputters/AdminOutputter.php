<?php

namespace App\Http\Admin\Outputters;

use App;
use CVEPDB\Services\Outputters\AbsLaravelOutputter;
//use App\Admin\Repositories\Users\LogContactRepositoryEloquent;
//use App\Admin\Repositories\Projects\ProjectRepositoryEloquent;

class AdminOutputter extends AbsLaravelOutputter
{
//    /**
//     * @var LogContactRepositoryEloquent|null
//     */
//    private $r_contact = null;
//
//    /**
//     * @var ProjectRepositoryEloquent|null
//     */
//    private $r_project = null;
//
//    public function __construct()
//    {
//        parent::__construct();
//
//        $this->r_contact = App::make('App\Admin\Repositories\Users\LogContactRepositoryEloquent');
//        $this->r_project = App::make('App\Admin\Repositories\Projects\ProjectRepositoryEloquent');
//
//        $this->addBreadcrumb('Dashboard', 'admin/');
//        $this->setBreadcrumbDivider('');
//        $this->breadcrumbs->setListElement('li');
//    }
//
//    public function output($view, $data)
//    {
//        return parent::output(
//            $view,
//            $data + $this->admin_data_sidebar()
//        );
//    }
//
//    private function admin_data_sidebar()
//    {
//        return [
//            'sidebar' => [
//                'prospection' => [
//                    'contact_pending' => $this->r_contact->findWhere(
//                        [
//                            'status' => 'pending',
//                            'type' => 'prospecting'
//                        ]
//                    )->count()
//                ],
//                'projects' => [
//                    'projects_running' => $this->r_project->findWhereNotIn(
//                        'status',
//                        [
//                            'delivered'
//                        ]
//                    )->count()
//                ]
//            ]
//        ];
//    }
}