<?php namespace cms\App\Services;

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
	public function getMenuWithDropDownWrapper($item)
	{
		return '<li class="treeview ' . $this->getActiveStateOnChild($item) . '"><a href="#">'
		. $item->getIcon() . '<span>' . $item->title
		. '</span><i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu menu-open">'
		. $this->getChildMenuItems($item) . '</ul></li>' . PHP_EOL;
	}

}
