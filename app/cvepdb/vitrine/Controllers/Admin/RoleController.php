<?php

namespace App\CVEPDB\Vitrine\Controllers\Admin;

use App\CVEPDB\Vitrine\Controllers\Abs\AbsController as Controller;
use App\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(15);

        return view('cvepdb.vitrine.admin.role', ['roles' => $roles]);
    }
}