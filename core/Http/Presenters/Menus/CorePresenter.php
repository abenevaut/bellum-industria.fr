<?php namespace Core\Http\Presenters\Menus;

use Pingpong\Menus\Presenters\Presenter;
use Pingpong\Menus\MenuItem;

/**
 * Class CorePresenter
 * @package Core\Http\Presenters\Menus
 */
abstract class CorePresenter extends Presenter
{

	/**
	 * Get open tag wrapper.
	 *
	 * @return string
	 */
	public function getOpenTagWrapper()
	{
	}

	/**
	 * Get close tag wrapper.
	 *
	 * @return string
	 */
	public function getCloseTagWrapper()
	{
	}

	/**
	 * Get menu tag without dropdown wrapper.
	 *
	 * @param \Pingpong\Menus\MenuItem $item
	 *
	 * @return string
	 */
	public function getMenuWithoutDropdownWrapper($item)
	{
	}

	/**
	 * Get divider tag wrapper.
	 *
	 * @return string
	 */
	public function getDividerWrapper()
	{
	}

	/**
	 * Get header dropdown tag wrapper.
	 *
	 * @param \Pingpong\Menus\MenuItem $item
	 *
	 * @return string
	 */
	public function getHeaderWrapper($item)
	{
	}

	/**
	 * Get menu tag with dropdown wrapper.
	 *
	 * @param \Pingpong\Menus\MenuItem $item
	 *
	 * @return string
	 */
	public function getMenuWithDropDownWrapper($item)
	{
	}

	/**
	 * Get multi level dropdown menu wrapper.
	 *
	 * @param \Pingpong\Menus\MenuItem $item
	 *
	 * @return string
	 */
	public function getMultiLevelDropdownWrapper($item)
	{
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
		return parent::getChildMenuItems($item);
	}
}
