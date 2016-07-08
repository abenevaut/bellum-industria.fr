<?php namespace Core\Http\Presenters\Menus;

use Pingpong\Menus\MenuItem;

/**
 * Class adminlteHeaderMenuPresenter
 * @package Core\Http\Presenters\Menus
 */
class adminlteHeaderMenuPresenter extends adminlteMenuPresenter
{

	/**
	 * {@inheritdoc }.
	 */
	public function getOpenTagWrapper()
	{
		return PHP_EOL . '<ul class="nav navbar-nav hidden-xs hidden-md">' . PHP_EOL;
	}

}
