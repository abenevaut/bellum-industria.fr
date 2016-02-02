<?php

namespace App\CVEPDB\Admin\Repositories;

use App\CVEPDB\Admin\Models\LogContact;

class ContactRepository
{
    /**
     * @return mixed
     */
    public function index()
    {
        return LogContact::orderBy('id', 'desc')->paginate(50);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return LogContact::findOrFail($id);
    }
}