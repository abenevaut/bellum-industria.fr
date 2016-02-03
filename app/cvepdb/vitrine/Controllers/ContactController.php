<?php

namespace App\CVEPDB\Vitrine\Controllers;

use Illuminate\Http\Request as Request;

use App\CVEPDB\Interfaces\Controllers\AbsBaseController as BaseController;
use App\CVEPDB\Admin\Models\LogContact;
use App\CVEPDB\Vitrine\Requests\ContactFormRequest;
use App\CVEPDB\Domain\Services\Mails\ContactMailService;

class ContactController extends BaseController
{
    private $mailer = null;

    public function __construct(ContactMailService $cmailer)
    {
        $this->mailer = $cmailer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('cvepdb.vitrine.contact');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
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
        $m_contacts = new LogContact();
        $m_contacts->first_name = $request->get('first_name');
        $m_contacts->last_name = $request->get('last_name');
        $m_contacts->email = $request->get('email');
        $m_contacts->subject = $request->get('subject');
        $m_contacts->message = $request->get('message');
        $m_contacts->save();

        $this->mailer->contact_form($m_contacts);

        return \Redirect::route('contact.index')
            ->with('message', 'Thanks for contacting us!');
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
}