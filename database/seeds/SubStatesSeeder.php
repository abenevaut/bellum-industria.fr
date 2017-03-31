<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use ABENEVAUT\Addresses\Domain\Addresses\Countries\Country;
use ABENEVAUT\Addresses\Domain\Addresses\States\State;
use ABENEVAUT\Addresses\Domain\Addresses\SubStates\SubState;
use ABENEVAUT\Addresses\Domain\Addresses\Addresses\Repositories\Iso3166;

/**
 * Class SubStatesSeeder
 *
 * States from ISO 3166
 * @seealso https://fr.wikipedia.org/wiki/ISO_3166
 */
class SubStatesSeeder extends Seeder
{

	public function run()
	{
		Model::unguard();

		// disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

		DB::table('substates')->truncate();

		collect(State::all())
			->each(function (State $state)
			{

				$states = Iso3166::regions_by_country($state->country->iso_3166_alpha_2);

				if (
					is_array($states)
					&& array_key_exists('regions', $states)
					&& is_array($states['regions'])
					&& array_key_exists($state->iso_3166_alpha_2, $states['regions'])
					&& is_array($states['regions'][$state->iso_3166_alpha_2])
					&& array_key_exists('subregions', $states['regions'][$state->iso_3166_alpha_2])
					&& is_array($states['regions'][$state->iso_3166_alpha_2]['subregions'])
				)
				{
					collect($states['regions'][$state->iso_3166_alpha_2]['subregions'])
						->each(function ($subregion, $subregion_a2) use ($state, $states)
						{
							SubState::create([
								'state_id'         => $state->id,
								'name'             => $subregion['name'],
								'slug'             => str_slug($subregion['name']),
								'subregions_label' => str_slug($states['subregions_label']),
								'iso_3166_alpha_2' => $subregion_a2,
							]);
						});
				}
			});

		DB::statement('SET FOREIGN_KEY_CHECKS=1;');

		Model::reguard();
	}

}
