<?php namespace Core\Http\Presenters\Menus;

use Pingpong\Menus\MenuItem;

/**
 * Class CoreMenuItem
 * @package Core\Http\Presenters\Menus
 */
abstract class CoreMenuItem extends MenuItem
{
    /**
     * Constructor.
     *
     * @param array $properties
     */
    public function __construct($properties = array())
    {
        parent::__construct($properties);
    }
}
