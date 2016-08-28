<?php namespace cms\Infrastructure\Abstractions\Presenters;

use Pingpong\Menus\Presenters\Presenter;
use Pingpong\Menus\MenuItem;

/**
 * Class NavigationPresenterAbstract
 * @package cms\Infrastructure\Abstractions\Presenters
 */
abstract class NavigationPresenterAbstract  extends Presenter
{

	/**
	 * {@inheritdoc }.
	 */
	public function getOpenTagWrapper()
	{
		return PHP_EOL . '<ul class="nav navbar-nav hidden-xs hidden-md">' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getCloseTagWrapper()
	{
		return PHP_EOL . '</ul>' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getMenuWithoutDropdownWrapper($item)
	{
		return '<li class="' . $this->getActiveState($item) . '"><a href="' . $item->getUrl() . '" ' . $item->getAttributes() . '>' . $item->getIcon() . ' <span>' . $item->title . '</span></a></li>' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getActiveState($item, $state = 'active')
	{
		return $item->isActive() ? $state : null;
	}

	/**
	 * Get active state on child items.
	 *
	 * @param        $item
	 * @param string $state
	 *
	 * @return null|string
	 */
	public function getActiveStateOnChild($item, $state = 'active')
	{
		return $item->hasActiveOnChild() ? $state : null;
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getDividerWrapper()
	{
		return '<li class="divider"></li>';
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getHeaderWrapper($item)
	{
		return '<li class="header">' . $item->title . '</li>';
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getMenuWithDropDownWrapper($item)
	{
		return '<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"> ' . $item->getIcon() . ' ' . $item->title . '  <span class="caret"></span></a>
		<ul class="dropdown-menu" role="menu">' . $this->getChildMenuItems($item) . '</ul></li>' . PHP_EOL;
	}

	/**
	 * Get multilevel menu wrapper.
	 *
	 * @param \Pingpong\Menus\MenuItem $item
	 *
	 * @return string`
	 */
	public function getMultiLevelDropdownWrapper($item)
	{
		return PHP_EOL;
	}

}
