<?php namespace cms\Infrastructure\Abstractions\Widgets;

use cms\Infrastructure\Interfaces\Widgets\WidgetsInterface;

/**
 * Class WidgetsAbstract
 * @package cms\Infrastructure\Abstractions\Widgets
 */
abstract class WidgetsAbstract implements WidgetsInterface
{

	/**
	 * @var string Widget title
	 */
	protected $title = null;

	/**
	 * @var string Widget description
	 */
	protected $description = null;

	/**
	 * @var string View namespace ('dashboard::'|null)
	 */
	protected $view_prefix = null;

	/**
	 * @var string
	 */
	protected $module = null;

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitlte()
	{
		return $this->title;
	}

	public function setDescription($description)
	{
		$this->description = $description;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setModuleName($module_name)
	{
		$this->module = $module_name . '::';
	}

	public function getModuleName()
	{
		return $this->module;
	}

	public function output($view, $data = [])
	{
		return cmsview($view, $data, $this->module, $this->view_prefix);
	}

	public function widgetInformation()
	{
		return [
			'title'       => $this->getTitlte(),
			'description' => $this->getDescription(),
		];
	}

}
