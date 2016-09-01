<?php

use Illuminate\Database\Seeder;
use CVEPDB\Addresses\Domain\Addresses\Countries\Country;

/**
 * Class CountriesSeeder
 *
 * Countries from ISO 3166
 * @seealso https://fr.wikipedia.org/wiki/ISO_3166
 */
class CountriesSeeder extends Seeder
{

	private $urlList = 'https://raw.githubusercontent.com/CavaENCOREparlerdebits/ISO-3166-Countries-with-Regional-Codes/master/all/all.json';

	public function run()
	{
		DB::table('countries')->truncate();

		$insertList = file_get_contents($this->urlList);
		$insertList = json_decode($insertList);

		collect($insertList)
			->each(function ($item)
			{
				Country::create([
					'name'             => $item->name,
					'slug'             => str_slug($item->name),
					'iso_3166_2'       => $item->{'iso_3166-2'},
					'iso_3166_alpha_2' => $item->{'alpha-2'},
					'iso_3166_alpha_3' => $item->{'alpha-3'},
				]);
			});
	}

}
