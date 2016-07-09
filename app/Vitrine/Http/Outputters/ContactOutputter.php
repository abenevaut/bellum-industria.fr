<?php namespace App\Vitrine\Http\Outputters;

use Core\Http\Outputters\FrontOutputter;
use Core\Http\Requests\FormRequest;
use Core\Domain\Settings\Repositories\SettingsRepository;
use App\Admin\Repositories\Posts\RssRepository;
use App\Admin\Repositories\Users\LogContact;
use App\Vitrine\Services\MailContactService;

/**
 * Class ContactOutputter
 * @package App\Vitrine\Http\Outputters
 */
class ContactOutputter extends FrontOutputter
{

	/**
	 * @var string Outputter header title
	 */
	protected $title = 'Contact';

	/**
	 * @var string Outputter header description
	 */
	protected $description = '';

	/**
	 * @var RssRepository|null
	 */
	private $r_rss = null;

	/**
	 * @var null
	 */
	private $mailer = null;

	/**
	 * SettingsOutputter constructor.
	 *
	 * @param SettingsRepository $r_settings
	 * @param MailContactService $cmailer
	 */
	public function __construct(
		SettingsRepository $r_settings,
		RssRepository $r_rss,
		MailContactService $cmailer
	)
	{
		parent::__construct($r_settings);

		$this->r_rss = $r_rss;
		$this->mailer = $cmailer;

		$this->title = trans('cvepdb/vitrine/contact.title');
		$this->description = trans('cvepdb/vitrine/contact.intro');

		$this->addBreadcrumb(trans('global.contact'), 'contact');
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->output('app/vitrine/contact');
	}

	/**
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function show(FormRequest $request)
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
