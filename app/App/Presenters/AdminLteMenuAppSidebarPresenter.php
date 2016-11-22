<?php namespace cms\App\Presenters;

use Illuminate\Support\Facades\Request;
use CVEPDB\Menus\Domain\Menus\Items\MenuItem;
use cms\Infrastructure\Abstractions\Presenters\NavigationPresenterAbstract;

/**
 * Class AdminLteMenuAppSidebarPresenter
 * @package cms\App\Services
 */
class AdminLteMenuAppSidebarPresenter extends NavigationPresenterAbstract
{

	/**
	 * {@inheritdoc }.
	 */
	public function getOpenTagWrapper()
	{
		return PHP_EOL . '<ul class="sidebar-menu">' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getActiveState(MenuItem $item, $state = 'active')
	{
		return (
			$item->isActive()
			|| Request::is(str_replace(url('/').'/', '', $item->getUrl()) . '/*')
		)
			? $state
			: null;
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getMenuWithDropDownWrapper(MenuItem $item)
	{
		return '<li class="treeview ' . $this->getActiveStateOnChild($item) . '"><a href="#">'
		. $item->getIcon() . '<span>' . $item->title
		. '</span><i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu menu-open">'
		. $this->getChildMenuItems($item) . '</ul></li>' . PHP_EOL;
	}

}
