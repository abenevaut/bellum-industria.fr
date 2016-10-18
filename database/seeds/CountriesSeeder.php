<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CVEPDB\Addresses\Domain\Addresses\Countries\Country;
use CVEPDB\Addresses\Domain\Addresses\Addresses\Repositories\Iso3166;

/**
 * Class CountriesSeeder
 *
 * Countries from ISO 3166
 * @seealso https://fr.wikipedia.org/wiki/ISO_3166
 */
class CountriesSeeder extends Seeder
{

	public function run()
	{
		Model::unguard();

		// disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table('countries')->truncate();

		$insertList = Iso3166::get_countries_from_web();

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

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		Model::reguard();
	}

}
