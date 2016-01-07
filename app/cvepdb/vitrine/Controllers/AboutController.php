<?php

namespace App\CVEPDB\Vitrine\Controllers;

use App\CVEPDB\Interfaces\Controllers\AbsBaseController as BaseController;
use App\CVEPDB\Vitrine\Models\LogContact;
use App\CVEPDB\Vitrine\Requests\ContactFormRequest;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class AboutController extends BaseController
{

    public function create()
    {
        return view('cvepdb.vitrine.contact');
    }

    public function store(ContactFormRequest $request)
    {
        $m_contacts = new LogContact();
        $m_contacts->first_name = $request->get('first_name');
        $m_contacts->last_name = $request->get('last_name');
        $m_contacts->email = $request->get('email');
        $m_contacts->subject = $request->get('subject');
        $m_contacts->message = $request->get('message');
        $m_contacts->save();

        \Mail::send(
            'cvepdb.vitrine.emails.contact',
            array(
                'name' => $m_contacts->first_name.' '.$m_contacts->last_name,
                'email' => $m_contacts->email,
                'user_message' => $m_contacts->message
            ),
            function ($message) use ($m_contacts){
                $message->from('contact@cavaencoreparlerdebits.fr')
                    ->to($m_contacts->email, $m_contacts->first_name.' '.$m_contacts->last_name)
                    ->cc('mailwatch@cavaencoreparlerdebits.fr')
                    ->subject('Prise de contact : ' . $m_contacts->subject);
            }
        );

        return \Redirect::route('contact')
            ->with('message', 'Thanks for contacting us!');
    }
}