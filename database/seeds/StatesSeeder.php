<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use ABENEVAUT\Addresses\Domain\Addresses\Countries\Country;
use ABENEVAUT\Addresses\Domain\Addresses\States\State;
use ABENEVAUT\Addresses\Domain\Addresses\Addresses\Repositories\Iso3166;

/**
 * Class StatesSeeder
 *
 * States from ISO 3166
 * @seealso https://fr.wikipedia.org/wiki/ISO_3166
 */
class StatesSeeder extends Seeder
{

	public function run()
	{
		Model::unguard();

		// disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table('states')->truncate();

		collect(Country::all())
			->each(function (Country $country)
			{
				$states = Iso3166::regions_by_country($country->iso_3166_alpha_2);

				if (is_array($states) && array_key_exists('regions', $states))
				{

					collect($states['regions'])
						->each(function($region, $region_a2) use ($country, $states) {
							State::create([
								'country_id'       => $country->id,
								'name'             => $region['name'],
								'slug'             => str_slug($region['name']),
								'regions_label'    => str_slug($states['regions_label']),
								'iso_3166_alpha_2' => $region_a2,
							]);
						});
				}
			});

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		Model::reguard();
	}

}
