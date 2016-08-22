<?php

use Illuminate\Support\Facades\Request;

if (!function_exists('adminlte_pagination'))
{
	/**
	 * Display the pagination of AdminLte theme.
	 *
	 * @return string
	 */
	function adminlte_pagination($nb_rows, $total_row, $current_page, $per_page = 15)
	{
		return with(
			new \cms\App\Services\AdminLtePaginationPresenter(
				new \Illuminate\Pagination\LengthAwarePaginator(
					$nb_rows,
					$total_row,
					$per_page,
					$current_page,
					[
						'path' => Request::url(),
						'query' => Request::query(),
					]
				)
			)
		)->render();
	}
}
