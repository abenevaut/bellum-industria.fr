<?php namespace App\Vitrine\Http\Controllers;

use Core\Http\Controllers\CorePublicController;
use App\Vitrine\Http\Requests\ContactFormRequest;
use App\Vitrine\Http\Outputters\ContactOutputter;
use App\Admin\Repositories\Users\LogContact;
use App\Vitrine\Services\MailContactService;

/**
 * Class ContactController
 * @package App\Vitrine\Controllers
 */
class ContactController extends CorePublicController
{

	/**
	 * @var ContactOutputter|null
	 */
	protected $outputter = null;

	/**
	 * @var null
	 */
	private $mailer = null;

	/**
	 * PageController constructor.
	 *
	 * @param ContactOutputter   $outputter
	 * @param MailContactService $cmailer
	 */
	public function __construct(
		ContactOutputter $outputter,
		MailContactService $cmailer
	)
	{
		parent::__construct();

		$this->outputter = $outputter;
		$this->mailer = $cmailer;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->outputter->output('app/vitrine/contact');
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
//        $m_contacts = new LogContact();
//        $m_contacts->first_name = $request->get('first_name');
//        $m_contacts->last_name = $request->get('last_name');
//        $m_contacts->email = $request->get('email');
//        $m_contacts->subject = $request->get('subject');
//        $m_contacts->message = $request->get('message');
//        $m_contacts->save();
//
//        $this->mailer->contact_form($m_contacts);

		return \Redirect::route('contact.index')
			->with('message', 'Thanks for contacting us!');
	}
}