<?php namespace Modules\ClashOfClan\Widgets;

use CVEPDB\Contracts\Widgets;
use ClashOfClans\Api\Clan as COCClan;
use ClashOfClans\Client as COCClient;
use CVEPDB\Settings\Facades\Settings;

/**
 * Class Clan
 *
 * {!! Widget::clan('#PY2UJ8C0') !!}
 *
 * @package Modules\Users\Widgets
 */
class Clan implements Widgets
{

	/**
	 * @var string Widget title
	 */
	protected $title = 'Display clan information';

	/**
	 * @var string Widget description
	 */
	protected $description = 'Display clan information by clan tag';

	/**
	 * @var string View namespace ('dashboard::'|null)
	 */
	protected $view_prefix = 'clashofclan::';

	/**
	 * @var string
	 */
	protected $module = 'clashofclan::';

	/**
	 * @var COCClient|null
	 */
	private $api_coc = null;

	/**
	 * Clan constructor.
	 */
	public function __construct()
	{
		$this->api_coc = new COCClient(Settings::get('clashofclan.api_key'));
	}

	/**
	 * @param $title
	 */
	public function setTitle($title)
	{
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitlte()
	{
		return $this->title;
	}

	/**
	 * @param $description
	 */
	public function setDescription($description)
	{
		$this->description = $description;
	}

	/**
	 * @return string
	 */
	public function getDescription()
	{
		return $this->description;
	}

	/**
	 * @param $module_name
	 */
	public function setModuleName($module_name)
	{
		$this->module = $module_name . '::';
	}

	/**
	 * @return string
	 */
	public function getModuleName()
	{
		return $this->module;
	}

	/**
	 * @param       $view
	 * @param array $data
	 *
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function output($view, $data = [])
	{
		return cmsview($view, $data, $this->view_prefix, $this->module);
	}

	/**
	 * @return array
	 */
	public function widgetInformation()
	{
		return [
			'title'       => $this->getTitlte(),
			'description' => $this->getDescription(),
		];
	}

	/**
	 * @param null $action
	 *
	 * @return array|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
	public function register($tag = null)
	{
		$coc_clan = null;

		try
		{
			$coc_clan = $this->api_coc->getClan($tag);
		}
		catch (\Exception $e)
		{
			$coc_clan = [];
		}

		return $this->output('clashofclan.widgets.clan', ['coc_clan' => $coc_clan]);
	}
}
