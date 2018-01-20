<?php

namespace bellumindustria\Domain\Pages\About\Repositories;

class AboutRepository
{

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function frontendShowAboutIndexView()
	{
		return view('frontend.pages.about.index', [
			'metadata' => [
				'title' => 'About',
			]
		]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function frontendShowTermsOfServicesIndexView()
	{
		return view('frontend.pages.about.termsofservices', [
			'metadata' => [
				'title' => 'Terms of services',
			]
		]);
	}

	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function frontendShowCGUIndexView()
	{
		return view('frontend.pages.about.cgu', [
			'metadata' => [
				'title' => 'CGU',
			]
		]);
	}
}
