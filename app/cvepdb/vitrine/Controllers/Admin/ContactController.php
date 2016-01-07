<?php

namespace App\CVEPDB\Vitrine\Controllers\Admin;

use App\CVEPDB\Vitrine\Controllers\Abs\AbsController as Controller;
use App\CVEPDB\Vitrine\Models\LogContact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = LogContact::paginate(15);

        return view('cvepdb.vitrine.admin.contact', ['contacts' => $contacts]);
    }
}