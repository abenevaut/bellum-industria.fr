<?php namespace cms\Infrastructure\Interfaces\Widgets;

/**
 * Interface WidgetsInterface
 * @package cms\Infrastructure\Interfaces\Widgets
 */
interface WidgetsInterface
{

	/**
	 * @param $title
	 *
	 * @return mixed
	 */
	public function setTitle($title);

	/**
	 * @return mixed
	 */
	public function getTitlte();

	/**
	 * @param $description
	 *
	 * @return mixed
	 */
	public function setDescription($description);

	/**
	 * @return mixed
	 */
	public function getDescription();

	/**
	 * @param $module_name
	 *
	 * @return mixed
	 */
	public function setModuleName($module_name);

	/**
	 * @return mixed
	 */
	public function getModuleName();

	/**
	 * @param       $view
	 * @param array $data
	 *
	 * @return mixed
	 */
	public function output($view, $data = []);
}
