<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('backend_pagination'))
{
	/**
	 * Helper to display the pagination in Backend theme.
	 *
	 * @return string
	 */
	function backend_pagination(
		$nb_rows,
		$total_row,
		$current_page,
		$per_page = 15,
		$page_name = 'page'
	) {
		$paginator = new \Illuminate\Pagination\LengthAwarePaginator(
			$nb_rows,
			$total_row,
			$per_page,
			$current_page,
			[
				'path'  => Request::url(),
				'query' => Request::query(),
			]
		);

		$current_theme = \Theme::getCurrent();

		return $paginator
			->setPageName($page_name)
			->render($current_theme . '::partials.pagination');
	}
}
