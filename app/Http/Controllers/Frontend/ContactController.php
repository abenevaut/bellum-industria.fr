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

		/**
		 * Mail to user
		 */

		Mail::send(
			'frontend.contact.emails.handshake_mail_to_confirme_reception_to_sender',
			[
				'first_name' => $request->get('first_name'),
				'last_name'  => $request->get('last_name'),
				'body'       => $request->get('message'),
			],
			function($message) use ($request)
			{
				$message
					->to(
						$request->get('email')
					)
					->from(
						config('mail.from.address'),
						config('mail.from.name')
					)
					->bcc(
						config('mail.from.address'),
						config('mail.from.name')
					)
					->subject('Bellum Industria, ' . $request->get('subject'));
			});

		/**
		 * Mail to admin
		 */

		Mail::send(
			'frontend.contact.emails.handshake_mail_to_administrator',
			[
				'first_name' => $request->get('first_name'),
				'last_name'  => $request->get('last_name'),
				'email'      => $request->get('email'),
				'body'       => $request->get('message'),
			],
			function($message) use ($request)
			{
				$message
					->to(
						config('mail.from.address'),
						config('mail.from.name')
					)
					->from(
						config('mail.from.address'),
						config('mail.from.name')
					)
					->subject($request->get('subject'));
			});

		return redirect(route('frontend.contact.index'))
			->with('alert-success', 'Votre message à bien été envoyé :)');
	}
}
