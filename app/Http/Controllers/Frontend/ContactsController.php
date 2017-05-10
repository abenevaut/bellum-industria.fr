<?php

namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Http\Request\Frontend\Contacts\ContactRequest;

class ContactsController extends ControllerAbstract
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return view('frontend.contacts.index');
	}

	/**
	 *
	 */
	public function store(ContactRequest $request)
	{

		dd($request->all());

		redirect(route('frontend.contacts.index'));
	}
}
