<?php

if (!function_exists('chart_to_image')) {
	/**
	 * Transform HighCharts chart js data, stored in file, to an image.
	 */
	function chart_to_image($data_file, $image_output_path, $scale = 2.5, $width = 600, &$output = [], &$return = [])
	{
		$binary = base_path('vendor/bin/phantomjs');
		$script = base_path('phantomjs/highcharts_serverside/highcharts-convert.js');
		$script_callback = base_path('phantomjs/highcharts_serverside/callback/indicateurs/indicateurs_pdf_callback.js');

		exec(
			"$binary $script -infile $data_file -outfile $image_output_path -callback $script_callback -scale $scale -width $width",
			$output,
			$return
		);
	}
}
