<?php namespace bellumindustria\Http\Controllers\Backend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Organizations\Quotes\Repositories\QuotesRepositoryEloquent;

class QuotesController extends ControllerAbstract
{

	/**
	 * @var QuotesRepositoryEloquent|null
	 */
	protected $r_quotes = null;

	/**
	 * OrganizationsController constructor.
	 *
	 * @param QuotesRepositoryEloquent $r_quotes
	 */
	public function __construct(QuotesRepositoryEloquent $r_quotes)
	{
		$this->r_quotes = $r_quotes;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function index()
	{
		return $this->r_quotes->backendIndexView();
	}
}
