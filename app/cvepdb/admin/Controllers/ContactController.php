<?php

namespace App\CVEPDB\Admin\Controllers;

use App\CVEPDB\Admin\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Admin\Models\LogContact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = LogContact::paginate(15);

        return view('cvepdb.vitrine.admin.contact', ['contacts' => $contacts]);
    }
}