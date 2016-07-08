<?php namespace App\Vitrine\Http\Controllers;

use Core\Http\Controllers\CorePublicController;
use App\Vitrine\Http\Requests\ContactFormRequest;
use App\Vitrine\Http\Outputters\ContactOutputter;

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
	 * PageController constructor.
	 *
	 * @param ContactOutputter $outputter
	 */
	public function __construct(
		ContactOutputter $outputter
	)
	{
		parent::__construct();

		$this->outputter = $outputter;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return $this->outputter->index();
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
		return $this->outputter->show($request);
	}
}