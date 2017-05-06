<?php

namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Http\Controllers\Controller;

class ContactsController extends Controller
{

	public function index() {

		return view(
			'frontend.contacts.index',
			[
			]
		);
	}
}
