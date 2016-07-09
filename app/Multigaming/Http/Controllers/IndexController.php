<?php namespace App\Multigaming\Http\Controllers;

use Core\Http\Controllers\CorePublicController;
use App\Multigaming\Http\Outputters\IndexOutputter;

/**
 * Class IndexController
 * @package App\Multigaming\Http\Controllers
 */
class IndexController extends CorePublicController
{

	/**
	 * @var IndexOutputter|null
	 */
	private $outputter = null;

	public function __construct(IndexOutputter $outputter)
	{
		parent::__construct();
		$this->outputter = $outputter;
	}

	public function index()
	{
		return $this->outputter->index();
	}

	public function boutique()
	{
		return $this->outputter->boutique();
	}

	public function challenge()
	{
		return $this->outputter->challenge();
	}

	public function ranks()
	{
		return $this->outputter->ranks();
	}

	public function messageoftheday()
	{
		return $this->outputter->messageoftheday();
	}

	public function sitemap()
	{
		return $this->outputter->sitemap();
	}

}
