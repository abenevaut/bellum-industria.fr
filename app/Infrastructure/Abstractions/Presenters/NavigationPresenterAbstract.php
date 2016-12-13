<?php namespace cms\Infrastructure\Abstractions\Presenters;

use CVEPDB\Menus\Infrastructure\Abstractions\Presenters\PresenterAbstract;
use CVEPDB\Menus\Domain\Menus\Items\MenuItem;

/**
 * Class NavigationPresenterAbstract
 * @package cms\Infrastructure\Abstractions\Presenters
 */
abstract class NavigationPresenterAbstract extends PresenterAbstract
{

	/**
	 * {@inheritdoc }.
	 */
	public function getOpenTagWrapper()
	{
		return PHP_EOL
			. '<ul class="nav navbar-nav hidden-xs hidden-md">'
			. PHP_EOL;
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
	public function getMenuWithoutDropdownWrapper(MenuItem $item)
	{
		return '<li class="' . $this->getActiveState($item) . '"><a href="'
			. $item->getUrl() . '" ' . $item->getAttributes() . '>'
			. $item->getIcon() . ' <span>' . $item->title
			. '</span></a></li>' . PHP_EOL;
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getActiveState(MenuItem $item, $state = 'active')
	{
		return $item->isActive() ? $state : null;
	}

	/**
	 * Get active state on child items.
	 *
	 * @param MenuItem $item
	 * @param string   $state
	 *
	 * @return null|string
	 */
	public function getActiveStateOnChild(MenuItem $item, $state = 'active')
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
	public function getHeaderWrapper(MenuItem $item)
	{
		return '<li class="header">' . $item->title . '</li>';
	}

	/**
	 * {@inheritdoc }.
	 */
	public function getMenuWithDropDownWrapper(MenuItem $item)
	{
		return '<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"> '
			. $item->getIcon() . ' ' . $item->title
			. '  <span class="caret"></span></a><ul class="dropdown-menu" role="menu">'
			. $this->getChildMenuItems($item) . '</ul></li>' . PHP_EOL;
	}

	/**
	 * Get multilevel menu wrapper.
	 *
	 * @param \CVEPDB\Menus\Domain\Menus\Items\MenuItem $item
	 *
	 * @return string`
	 */
	public function getMultiLevelDropdownWrapper(MenuItem $item)
	{
		return PHP_EOL;
	}
}
