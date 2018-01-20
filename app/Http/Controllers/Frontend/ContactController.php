<?php

namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Request\Frontend\Contact\ContactRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends ControllerAbstract
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return view('frontend.contact.index');
	}

	/**
	 *
	 */
	public function store(ContactRequest $request) {


		return redirect(route('frontend.contact.index'))
			->with('alert-success', 'Votre message à bien été envoyé :)');
	}
}
