<?php namespace cms\App\Presenters;

use cms\Infrastructure\Abstractions\Presenters\NavigationPresenterAbstract;

class AdminLteMenuFrontHeaderPresenter extends NavigationPresenterAbstract
{

	/**
	 * {@inheritdoc }.
	 */
	public function getOpenTagWrapper() {
		return PHP_EOL . '<ul class="nav navbar-nav">' . PHP_EOL;
	}
}
