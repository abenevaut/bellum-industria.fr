<?php namespace Core\Http\Controllers\Api;

use Core\Http\Controllers\CoreApiController;

class DateController extends CoreApiController
{

	protected $apiMethods = [
		'french_hollidays' => [
			'keyAuthentication' => false,
			'limits'            => [
				'key'    => [
					'increment' => '1 hour',
					'limit'     => 100
				],
				'method' => [
					'increment' => '1 day',
					'limit'     => 2500
				]
			]
		]
	];

	/**
	 * curl --header "X-Authorization: API_KEY" http://localhost/api/v1/dates/french_hollidays
	 *
	 * @param $year
	 *
	 * @return mixed
	 */
	public function french_hollidays($year = null)
	{
		if ($year === null)
		{
			$year = intval(date('Y'));
		}

		$easterDate = easter_date($year);
		$easterDay = date('j', $easterDate);
		$easterMonth = date('n', $easterDate);
		$easterYear = date('Y', $easterDate);

		$holidays = array(
			// Dates fixes
			date('Y-m-d', mktime(0, 0, 0, 1, 1, $year)),  // 1er janvier
			date('Y-m-d', mktime(0, 0, 0, 5, 1, $year)),  // Fête du travail
			date('Y-m-d', mktime(0, 0, 0, 5, 8, $year)),  // Victoire des alliés
			date('Y-m-d', mktime(0, 0, 0, 7, 14, $year)),  // Fête nationale
			date('Y-m-d', mktime(0, 0, 0, 8, 15, $year)),  // Assomption
			date('Y-m-d', mktime(0, 0, 0, 11, 1, $year)),  // Toussaint
			date('Y-m-d', mktime(0, 0, 0, 11, 11, $year)),  // Armistice
			date('Y-m-d', mktime(0, 0, 0, 12, 25, $year)),  // Noel

			// Dates variables
			date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 2, $easterYear)),
			date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 40, $easterYear)),
			date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear)),
		);

		sort($holidays);

		return ['data' => $holidays];
	}

}
