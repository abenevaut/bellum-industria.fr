<?php

namespace cms\App\Services\Views;

/**
 * Interface ViewsInterface
 * @package cms\App\Services\Views
 */
interface ViewsInterface
{
	public function output($view, $data = []);
}
