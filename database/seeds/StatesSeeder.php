<?php

use Illuminate\Database\Seeder;
use CVEPDB\Addresses\Domain\Addresses\Countries\Country;
use CVEPDB\Addresses\Domain\Addresses\States\State;

/**
 * Class StatesSeeder
 *
 * States from ISO 3166
 * @seealso https://fr.wikipedia.org/wiki/ISO_3166
 */
class StatesSeeder extends Seeder
{

	private $insertList = [
		['name' => 'Alabama', 'a2' => 'AL', 'country_a2' => 'US'],
		['name' => 'Alaska', 'a2' => 'AK', 'country_a2' => 'US'],
		['name' => 'Arizona', 'a2' => 'AZ', 'country_a2' => 'US'],
		['name' => 'Arkansas', 'a2' => 'AR', 'country_a2' => 'US'],
		['name' => 'California', 'a2' => 'CA', 'country_a2' => 'US'],
		['name' => 'Colorado', 'a2' => 'CO', 'country_a2' => 'US'],
		['name' => 'Connecticut', 'a2' => 'CT', 'country_a2' => 'US'],
		['name' => 'Delaware', 'a2' => 'DE', 'country_a2' => 'US'],
		['name' => 'District of Columbia', 'a2' => 'DC', 'country_a2' => 'US'],
		['name' => 'Florida', 'a2' => 'FL', 'country_a2' => 'US'],
		['name' => 'Georgia', 'a2' => 'GA', 'country_a2' => 'US'],
		['name' => 'Hawaii', 'a2' => 'HI', 'country_a2' => 'US'],
		['name' => 'Idaho', 'a2' => 'ID', 'country_a2' => 'US'],
		['name' => 'Illinois', 'a2' => 'IL', 'country_a2' => 'US'],
		['name' => 'Indiana', 'a2' => 'IN', 'country_a2' => 'US'],
		['name' => 'Iowa', 'a2' => 'IA', 'country_a2' => 'US'],
		['name' => 'Kansas', 'a2' => 'KS', 'country_a2' => 'US'],
		['name' => 'Kentucky', 'a2' => 'KY', 'country_a2' => 'US'],
		['name' => 'Louisiana', 'a2' => 'LA', 'country_a2' => 'US'],
		['name' => 'Maine', 'a2' => 'ME', 'country_a2' => 'US'],
		['name' => 'Maryland', 'a2' => 'MD', 'country_a2' => 'US'],
		['name' => 'Massachusetts', 'a2' => 'MA', 'country_a2' => 'US'],
		['name' => 'Michigan', 'a2' => 'MI', 'country_a2' => 'US'],
		['name' => 'Minnesota', 'a2' => 'MN', 'country_a2' => 'US'],
		['name' => 'Mississippi', 'a2' => 'MS', 'country_a2' => 'US'],
		['name' => 'Missouri', 'a2' => 'MO', 'country_a2' => 'US'],
		['name' => 'Montana', 'a2' => 'MT', 'country_a2' => 'US'],
		['name' => 'Nebraska', 'a2' => 'NE', 'country_a2' => 'US'],
		['name' => 'Nevada', 'a2' => 'NV', 'country_a2' => 'US'],
		['name' => 'New Hampshire', 'a2' => 'NH', 'country_a2' => 'US'],
		['name' => 'New Jersey', 'a2' => 'NJ', 'country_a2' => 'US'],
		['name' => 'New Mexico', 'a2' => 'NM', 'country_a2' => 'US'],
		['name' => 'New York', 'a2' => 'NY', 'country_a2' => 'US'],
		['name' => 'North Carolina', 'a2' => 'NC', 'country_a2' => 'US'],
		['name' => 'North Dakota', 'a2' => 'ND', 'country_a2' => 'US'],
		['name' => 'Ohio', 'a2' => 'OH', 'country_a2' => 'US'],
		['name' => 'Oklahoma', 'a2' => 'OK', 'country_a2' => 'US'],
		['name' => 'Oregon', 'a2' => 'OR', 'country_a2' => 'US'],
		['name' => 'Pennsylvania', 'a2' => 'PA', 'country_a2' => 'US'],
		['name' => 'Puerto Rico', 'a2' => 'PR', 'country_a2' => 'US'],
		['name' => 'Rhode Island', 'a2' => 'RI', 'country_a2' => 'US'],
		['name' => 'South Carolina', 'a2' => 'SC', 'country_a2' => 'US'],
		['name' => 'South Dakota', 'a2' => 'SD', 'country_a2' => 'US'],
		['name' => 'Tennessee', 'a2' => 'TN', 'country_a2' => 'US'],
		['name' => 'Texas', 'a2' => 'TX', 'country_a2' => 'US'],
		['name' => 'Utah', 'a2' => 'UT', 'country_a2' => 'US'],
		['name' => 'Vermont', 'a2' => 'VT', 'country_a2' => 'US'],
		['name' => 'Virginia', 'a2' => 'VA', 'country_a2' => 'US'],
		['name' => 'Washington', 'a2' => 'WA', 'country_a2' => 'US'],
		['name' => 'West Virginia', 'a2' => 'WV', 'country_a2' => 'US'],
		['name' => 'Wisconsin', 'a2' => 'WI', 'country_a2' => 'US'],
		['name' => 'Wyoming', 'a2' => 'WY', 'country_a2' => 'US'],

		// Canada
		['name' => 'Alberta', 'a2' => 'AB', 'country_a2' => 'CA'],
		['name' => 'British Columbia', 'a2' => 'BC', 'country_a2' => 'CA'],
		['name' => 'Manitoba', 'a2' => 'MB', 'country_a2' => 'CA'],
		['name' => 'New Brunswick', 'a2' => 'NB', 'country_a2' => 'CA'],
		['name' => 'Newfoundland', 'a2' => 'NF', 'country_a2' => 'CA'],
		['name' => 'Northwest Territories', 'a2' => 'NT', 'country_a2' => 'CA'],
		['name' => 'Nova Scotia', 'a2' => 'NS', 'country_a2' => 'CA'],
		['name' => 'Nunavut', 'a2' => 'NU', 'country_a2' => 'CA'],
		['name' => 'Ontario', 'a2' => 'ON', 'country_a2' => 'CA'],
		['name' => 'Prince Edward Island', 'a2' => 'PE', 'country_a2' => 'CA'],
		['name' => 'Quebec', 'a2' => 'PQ', 'country_a2' => 'CA'],
		['name' => 'Saskatchewan', 'a2' => 'SK', 'country_a2' => 'CA'],
		['name' => 'Yukon', 'a2' => 'YT', 'country_a2' => 'CA'],

		// Mexico
		['name' => 'Aguascalientes', 'a2' => 'AG', 'country_a2' => 'MX'],
		['name' => 'Baja California', 'a2' => 'BJ', 'country_a2' => 'MX'],
		['name' => 'Baja California Sur', 'a2' => 'BS', 'country_a2' => 'MX'],
		['name' => 'Campeche', 'a2' => 'CP', 'country_a2' => 'MX'],
		['name' => 'Chiapas', 'a2' => 'CH', 'country_a2' => 'MX'],
		['name' => 'Chihuahua', 'a2' => 'CI', 'country_a2' => 'MX'],
		['name' => 'Coahuila de Zaragoza', 'a2' => 'CU', 'country_a2' => 'MX'],
		['name' => 'Colima', 'a2' => 'CL', 'country_a2' => 'MX'],
		['name' => 'Distrito Federal', 'a2' => 'DF', 'country_a2' => 'MX'],
		['name' => 'Durango', 'a2' => 'DG', 'country_a2' => 'MX'],
		['name' => 'Estado Mexico', 'a2' => 'EM', 'country_a2' => 'MX'],
		['name' => 'Guanajuato', 'a2' => 'GJ', 'country_a2' => 'MX'],
		['name' => 'Guerrero', 'a2' => 'GR', 'country_a2' => 'MX'],
		['name' => 'Hidalgo', 'a2' => 'HG', 'country_a2' => 'MX'],
		['name' => 'Jalisco', 'a2' => 'JA', 'country_a2' => 'MX'],
		['name' => 'Mexico', 'a2' => 'MX', 'country_a2' => 'MX'],
		['name' => 'Michoacan', 'a2' => 'MH', 'country_a2' => 'MX'],
		['name' => 'Morelos', 'a2' => 'MR', 'country_a2' => 'MX'],
		['name' => 'Nayarit', 'a2' => 'NA', 'country_a2' => 'MX'],
		['name' => 'Nuevo Leon', 'a2' => 'NL', 'country_a2' => 'MX'],
		['name' => 'Oaxaca', 'a2' => 'OA', 'country_a2' => 'MX'],
		['name' => 'Puebla', 'a2' => 'PU', 'country_a2' => 'MX'],
		['name' => 'Queretaro', 'a2' => 'QA', 'country_a2' => 'MX'],
		['name' => 'Quintana Roo', 'a2' => 'QR', 'country_a2' => 'MX'],
		['name' => 'San Luis Potosi', 'a2' => 'SL', 'country_a2' => 'MX'],
		['name' => 'Sinaloa', 'a2' => 'SI', 'country_a2' => 'MX'],
		['name' => 'Sonora', 'a2' => 'SO', 'country_a2' => 'MX'],
		['name' => 'Tabasco', 'a2' => 'TA', 'country_a2' => 'MX'],
		['name' => 'Tamaulipas', 'a2' => 'TM', 'country_a2' => 'MX'],
		['name' => 'Tlaxcala', 'a2' => 'TL', 'country_a2' => 'MX'],
		['name' => 'Veracruz Llave', 'a2' => 'VL', 'country_a2' => 'MX'],
		['name' => 'Yucatan', 'a2' => 'YC', 'country_a2' => 'MX'],
		['name' => 'Zacatecas', 'a2' => 'ZT', 'country_a2' => 'MX'],

		// France - a2 => code INSEE - https://fr.wikipedia.org/wiki/R%C3%A9gion_fran%C3%A7aise
		['name' => 'Alsace-Champagne-Ardenne-Lorraine', 'insee' => '44', 'country_a2' => 'FR'],
		['name' => 'Aquitaine-Limousin-Poitou-Charentes', 'insee' => '75', 'country_a2' => 'FR'],
		['name' => 'Auvergne-Rhône-Alpes', 'insee' => '84', 'country_a2' => 'FR'],
		['name' => 'Bourgogne-Franche-Comté', 'insee' => '27', 'country_a2' => 'FR'],
		['name' => 'Bretagne', 'insee' => '53', 'country_a2' => 'FR'],
		['name' => 'Centre-Val de Loire', 'insee' => '24', 'country_a2' => 'FR'],
		['name' => 'Corse', 'insee' => '94', 'country_a2' => 'FR'],
		['name' => 'Île-de-France', 'insee' => '11', 'country_a2' => 'FR'],
		['name' => 'Languedoc-Roussillon-Midi-Pyrénées', 'insee' => '76', 'country_a2' => 'FR'],
		['name' => 'Nord-Pas-de-Calais-Picardie', 'insee' => '32', 'country_a2' => 'FR'],
		['name' => 'Normandie', 'insee' => '28', 'country_a2' => 'FR'],
		['name' => 'Pays de la Loire', 'insee' => '52', 'country_a2' => 'FR'],
		['name' => 'Provence-Alpes-Côte d\'Azur', 'insee' => '93', 'country_a2' => 'FR'],
		['name' => 'Guadeloupe', 'insee' => '01', 'country_a2' => 'FR'],
		['name' => 'Martinique', 'insee' => '02', 'country_a2' => 'FR'],
		['name' => 'Guyane', 'insee' => '03', 'country_a2' => 'FR'],
		['name' => 'La Réunion', 'insee' => '04', 'country_a2' => 'FR'],
		['name' => 'Mayotte', 'insee' => '05', 'country_a2' => 'FR'],
	];

	public function run()
	{
		DB::table('states')->truncate();

		collect($this->insertList)
			->each(function ($item)
			{
				$country = Country::where('iso_3166_alpha_2', '=', $item['country_a2'])
					->first();

				State::create([
					'country_id'       => $country->id,
					'name'             => $item['name'],
					'slug'             => str_slug($item['name']),
					'iso_3166_alpha_2' => isset($item['a2']) ? $item['a2'] : null,
					'code_insee'       => isset($item['insee']) ? $item['insee'] : null,
				]);
			});
	}

}
