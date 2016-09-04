<?php namespace cms\Vitrine\Http\Controllers;

use cms\Infrastructure\Abstractions\Controllers\FrontendController;
use cms\Vitrine\Http\Requests\ContactFormRequest;
use cms\Vitrine\Repositories\LogContact;
use cms\Vitrine\Services\MailContactService;

/**
 * Class ContactController
 * @package cms\Vitrine\Http\Controllers
 */
class ContactController extends FrontendController
{

	/**
	 * @var MailContactService|null
	 */
	protected $s_mailer = null;

	/**
	 * ContactController constructor.
	 *
	 * @param MailContactService $s_mailer
	 */
	public function __construct(
		MailContactService $s_mailer
	)
	{
		$this->s_mailer = $s_mailer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return view('app/vitrine/contact');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param ContactFormRequest $request
	 *
	 * @return \Illuminate\Http\RedirectResponse
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

		$this->s_mailer->send($m_contacts);

		return redirect('contact')
			->with('message', 'Thanks for contacting us!');
	}

}
