<?php

namespace App\CVEPDB\Admin\Controllers;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(15);

        return view('cvepdb.admin.role', ['roles' => $roles]);
    }
}