<?php namespace CVEPDB\Abstracts\Criterias;

use Illuminate\Http\Request as IlluminateRequest;
use Prettus\Repository\Criteria\RequestCriteria as PrettusRequestCriteria;

/**
 * Class Criteria
 * @package Prettus\Repository\Criteria
 */
class RequestCriteria extends PrettusRequestCriteria
{

	/**
	 * RequestCriteria constructor.
	 *
	 * @param IlluminateRequest $request
	 */
	public function __construct(IlluminateRequest $request)
	{
		parent::__construct($request);
	}
}
