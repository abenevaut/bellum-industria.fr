<?php

namespace cms\App\Services\Views;

use cms\App\Services\Views\ViewsInterface;

/**
 * Class HtmlViews
 * @package cms\App\Services\Views
 */
class HtmlViews implements ViewsInterface
{

	protected $view_prefix = null;

	protected $current_module = null;

	public function setViewPrefix($view_prefix)
	{
		$this->view_prefix = $view_prefix;
	}

	public function setCurrentModule($current_module)
	{
		$this->current_module = $current_module;
	}

	public function output($view, $data = [])
	{
		return cmsview(
			$view,
			$data,
			$this->current_module,
			$this->view_prefix
		);
	}
}
