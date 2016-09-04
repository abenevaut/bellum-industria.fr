<?php

use Illuminate\Database\Seeder;
use CVEPDB\Addresses\Domain\Addresses\Countries\Country;
use CVEPDB\Addresses\Domain\Addresses\States\State;
use CVEPDB\Addresses\Domain\Addresses\SubStates\SubState;
use CVEPDB\Addresses\Domain\Addresses\Addresses\Repositories\Iso3166;

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
		DB::table('substates')->truncate();

		for ($i = 1; $states = State::forPage($i, 30); ++$i)
		{
			if (!$states->count())
			{
				break;
			}

			$states
				->each(function (State $state)
				{

					$states = Iso3166::regions_by_country($state->country->iso_3166_alpha_2);

					if (array_key_exists('regions', $states))
					{
						collect($states['regions'])
							->each(function ($region) use ($state, $states)
							{
								if (array_key_exists('subregions', $region))
								{
									collect($region['subregions'])
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
					}
				});
		}
	}

}
