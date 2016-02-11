<?php

namespace App\Admin\Outputters;

use CVEPDB\Services\Outputters\AbsLaravelOutputter;
use CVEPDB\Requests\Request;
use App\Admin\Repositories\Users\LogContactRepositoryEloquent as ContactRepository;

class ContactOutputter extends AbsLaravelOutputter
{
    /**
     * @var null LogContact repository
     */
    private $r_LogContact = null;

    public function __construct(ContactRepository $r_LogContact)
    {
        parent::__construct();

        $this->r_LogContact = $r_LogContact;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = $this->r_LogContact->all();

        return $this->output(
            'cvepdb.admin.contacts.index',
            [
                'contacts' => $contacts
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    public function createClient($id)
    {
//        $contact = $this->r_LogContact->get($id);
//
//        return view(
//            'cvepdb.admin.contacts.create_client',
//            [
//                'contact' => $contact
//            ]
//        );
    }
}