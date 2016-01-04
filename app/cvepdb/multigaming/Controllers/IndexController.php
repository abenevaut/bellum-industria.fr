<?php

namespace App\CVEPDB\Multigaming\Controllers;

use App\CVEPDB\Multigaming\Controllers\Abs\AbsBaseController as BaseController;
use App\CVEPDB\Multigaming\Domains\IndexDomain as IndexDomain;

class IndexController extends BaseController
{
    /**
     * @var IndexDomain|null Domain object
     */
    private $domain = null;

    public function __construct()
    {
        parent::__construct();

        $this->domain = new IndexDomain;
    }

    public function getIndex()
    {

//        $admin = new \App\Role();
//        $admin->name         = 'admin';
//        $admin->display_name = 'User Administrator'; // optional
//        $admin->description  = 'User is allowed to manage and edit other users'; // optional
//        $admin->save();



        $user = \App\User::where('id', '=', '1')->first();
        $admin = \App\Role::where('id', '=', '1')->first();
//
//        // role attach alias
//        $user->attachRole($admin);






//        $createPost = new \App\Permission();
//        $createPost->name         = 'create-team';
//        $createPost->display_name = 'Create Team'; // optional
//        // Allow a user to...
//        $createPost->description  = 'create new team'; // optional
//        $createPost->save();
//
//        $editUser = new \App\Permission();
//        $editUser->name         = 'edit-team';
//        $editUser->display_name = 'Edit Team'; // optional
//        // Allow a user to...
//        $editUser->description  = 'edit existing team'; // optional
//        $editUser->save();
//
//        $admin->attachPermission($createPost);




        return $this->domain->indexIndex();
    }

    public function getBoutique()
    {
        return $this->domain->indexBoutique();
    }

    public function getSitemap()
    {
        return $this->domain->indexSitemap();
    }
}