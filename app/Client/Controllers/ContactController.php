<?php

namespace App\Client\Controllers;

use CVEPDB\Controllers\AbsController as Controller;

use App\Client\Requests\ContactFormRequest;
use App\Admin\Repositories\Users\LogContactRepositoryEloquent;
use App\CVEPDB\Services\Mails\ContactMailService;

class ContactController extends Controller
{
    private $mailer = null;
    private $r_logcontact = null;

    public function __construct(ContactMailService $cmailer, LogContactRepositoryEloquent $r_logcontact)
    {
        $this->mailer = $cmailer;
        $this->r_logcontact = $r_logcontact;
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
    public function store(ContactFormRequest $request)
    {
        $contact = $this->r_logcontact->create([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'subject' => $request->get('subject'),
            'message' => $request->get('message'),
        ]);

        $this->mailer->contact_form($contact);

        return \Redirect::route('clients.entites.join')
            ->with('message', 'Thanks for contacting us!');
    }
}