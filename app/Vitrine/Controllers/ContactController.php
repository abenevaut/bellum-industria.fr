<?php

namespace App\Vitrine\Controllers;

use Illuminate\Http\Request as Request;
use CVEPDB\Controllers\AbsBaseController as BaseController;

use App\Admin\Models\LogContact;
use App\Vitrine\Requests\ContactFormRequest;
use App\CVEPDB\Services\Mails\ContactMailService;

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
}