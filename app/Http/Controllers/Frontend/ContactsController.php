<?php

namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Http\Controllers\Controller;

class ContactsController extends Controller
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index() {
		return view(
			'frontend.contacts.index',
			[
			]
		);
	}

	/**
	 *
	 */
	public function store()
	{
		redirect(route('frontend.contacts'));
	}
}
