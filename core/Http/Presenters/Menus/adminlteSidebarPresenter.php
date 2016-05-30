<?php namespace Core\Http\Presenters\Menus;

use Pingpong\Menus\MenuItem;

/**
 * Class adminlteSidebarPresenter
 * @package Core\Http\Presenters\Menus
 */
class adminlteSidebarPresenter extends CorePresenter
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
		return '<li class="treeview ' . $this->getActiveStateOnChild($item) . '"><a href="#">'
		. $item->getIcon() . '<span>' . $item->title
		. '</span><i class="fa fa-angle-left pull-right"></i></a><ul class="treeview-menu menu-open">'
		. $this->getChildMenuItems($item) . '</ul></li>' . PHP_EOL;
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

	/**
	 * Get child menu items.
	 *
	 * @param \Pingpong\Menus\MenuItem $item
	 *
	 * @return string
	 */
	public function getChildMenuItems(MenuItem $item)
	{
		$results = '';

		foreach ($item->getChilds() as $child)
		{
			if ($child->hidden())
			{
				continue;
			}

			if ($child->hasSubMenu())
			{
				$results .= $this->getMultiLevelDropdownWrapper($child);
			}
			elseif ($child->isHeader())
			{
				$results .= $this->getHeaderWrapper($child);
			}
			elseif ($child->isDivider())
			{
				$results .= $this->getDividerWrapper();
			}
			else
			{
				$results .= $this->getMenuWithoutDropdownWrapper($child);
			}
		}

		return $results;
	}
}
