<?php namespace cms\Vitrine\Http\Controllers;

use cms\Infrastructure\Abstractions\Controllers\FrontendController;
use cms\Vitrine\Http\Requests\ContactFormRequest;

/**
 * Class ContactController
 * @package cms\Vitrine\Http\Controllers
 */
class ContactController extends FrontendController
{

	/**
	 * PageController constructor.
	 */
	public function __construct(
	)
	{
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('app/vitrine/contact');
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
		$m_contacts = new LogContact();
		$m_contacts->first_name = $request->get('first_name');
		$m_contacts->last_name = $request->get('last_name');
		$m_contacts->email = $request->get('email');
		$m_contacts->subject = $request->get('subject');
		$m_contacts->message = $request->get('message');
//		$m_contacts->save();

		$this->mailer->send($m_contacts);

		return $this->redirectTo('contact')
			->with('message', 'Thanks for contacting us!');
	}

}
