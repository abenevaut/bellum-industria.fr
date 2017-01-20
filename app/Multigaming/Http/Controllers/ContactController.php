<?php namespace cms\Multigaming\Http\Controllers;

use cms\Infrastructure\Abstractions\Controllers\FrontendController;
use cms\Multigaming\Http\Requests\ContactFormRequest;
use cms\Multigaming\Services\MailContactService;

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
	public function __construct(MailContactService $s_mailer)
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
		return view('app/multigaming/contact');
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
		$this
			->s_mailer
			->send(
				$request->get('first_name'),
				$request->get('last_name'),
				$request->get('email'),
				$request->get('subject'),
				$request->get('message')
			);

		return redirect('contact')
			->with('message-success', 'Thanks for contacting us!');
	}
}
