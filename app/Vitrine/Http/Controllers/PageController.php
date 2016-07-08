<?php namespace App\Vitrine\Http\Controllers;

use Core\Http\Controllers\CorePublicController;
use App\Vitrine\Http\Outputters\PageOutputter;

/**
 * Class PageController
 * @package App\Http\Controllers
 */
class PageController extends CorePublicController
{

	/**
	 * @var PageOutputter|null
	 */
	protected $outputter = null;

	/**
	 * PageController constructor.
	 *
	 * @param PageOutputter $outputter
	 */
	public function __construct(PageOutputter $outputter)
	{
		parent::__construct();

		$this->outputter = $outputter;
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->outputter->index();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function services()
	{
		return $this->outputter->services();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function about()
	{
		return $this->outputter->about();
	}
}
