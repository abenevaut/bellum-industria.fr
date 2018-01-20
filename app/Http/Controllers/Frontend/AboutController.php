<?php

namespace bellumindustria\Http\Controllers\Frontend;

use bellumindustria\Infrastructure\Contracts\Controllers\ControllerAbstract;
use bellumindustria\Domain\Pages\About\Repositories\AboutRepository;

class AboutController extends ControllerAbstract
{

	/**
	 * @var AboutRepository|null
	 */
	public $r_about = null;

	/**
	 * HomeController constructor.
	 *
	 * @param AboutRepository $r_about
	 */
	public function __construct(AboutRepository $r_about) {
		$this->r_about = $r_about;

		$this->before();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function terms() {
		return $this->r_about->frontendShowTermsOfServicesIndexView();
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function cgu() {
		return $this->r_about->frontendShowCGUIndexView();
	}
}
