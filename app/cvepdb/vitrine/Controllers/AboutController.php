<?php

namespace App\CVEPDB\Vitrine\Controllers;

use App\CVEPDB\Vitrine\Controllers\AbsBaseController as BaseController;
use App\CVEPDB\Vitrine\Requests\ContactFormRequest;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class AboutController extends BaseController {

    public function create() {
        $this->breadcrumbs->addCrumb('Contact', '/contact');
        return view('cvepdb.vitrine.contact', ['breadcrumbs' => $this->breadcrumbs]);
    }

    public function store(ContactFormRequest $request) {

        \Mail::send(
            'cvepdb.vitrine.emails.contact',
            array(
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'user_message' => $request->get('message')
            ),
            function($message) {
                $message->from('wj@wjgilmore.com');
                $message->to('wj@wjgilmore.com', 'Admin')->subject('TODOParrot Feedback');
            }
        );

        return \Redirect::route('contact')
            ->with('message', 'Thanks for contacting us!');
    }
}