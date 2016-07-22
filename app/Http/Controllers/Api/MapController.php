<?php namespace cms\Http\Controllers\Api;

use cms\Infrastructure\Abstractions\Controllers\ApiController;
use Toin0u\Geocoder\Facade\Geocoder;
use Geocoder\Exception\ChainNoResultException;

/**
 * Class MapController
 * @package cms\Http\Controllers\Api
 */
class MapController extends ApiController
{

	protected $apiMethods = [
		'geolocalisation' => [
			'keyAuthentication' => false,
			'limits'            => [
				'key'    => [
					'increment' => '1 hour',
					'limit'     => 50
				],
				'method' => [
					'increment' => '1 day',
					'limit'     => 1250
				]
			]
		],
		'address'         => [
			'keyAuthentication' => false,
			'limits'            => [
				'key'    => [
					'increment' => '1 hour',
					'limit'     => 50
				],
				'method' => [
					'increment' => '1 day',
					'limit'     => 1250
				]
			]
		]
	];

	/**
	 * curl --header "X-Authorization: API_KEY"
	 * http://localhost/api/v1/maps/geolocalisation/48.780426/2.266257
	 *
	 * @param $latitude
	 * @param $longitude
	 *
	 * @return array
	 */
	public function geolocalisation($latitude, $longitude)
	{
		$geocode = [];

		$latitude = urldecode($latitude);
		$longitude = urldecode($longitude);

		try
		{
			$geocode = Geocoder::geocode('json', ["latlng" => "$latitude,$longitude"]);
			$geocode = json_decode($geocode);
		}
		catch (ChainNoResultException $e)
		{

			// Todo : send to sentry

			// echo $e->getMessage(); exit;

			$geocode = ['error' => $e->getMessage()];
		}
		catch (\Exception $e)
		{

			// Todo : send to sentry

			// echo $e->getMessage(); exit;

			$geocode = ['error' => $e->getMessage()];
		}

		return [$geocode];
	}

	/**
	 * curl --header "X-Authorization: API_KEY"
	 * http://api.cvepdb.fr/v1/maps/address/plessis%20robinson
	 *
	 * @param $address
	 *
	 * @return array
	 */
	public function address($address)
	{
		$geocode = [];

		$address = urldecode($address);

		try
		{
			$geocode = Geocoder::geocode('json', ["address" => $address]);
			$geocode = json_decode($geocode);
		}
		catch (ChainNoResultException $e)
		{

			// Todo : send to sentry

			// echo $e->getMessage(); exit;

			$geocode = ['error' => $e->getMessage()];
		}
		catch (\Exception $e)
		{

			// Todo : send to sentry

			// echo $e->getMessage(); exit;

			$geocode = ['error' => $e->getMessage()];
		}

		return [$geocode];
	}

}
