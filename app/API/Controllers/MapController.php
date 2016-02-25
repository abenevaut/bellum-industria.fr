<?php

namespace App\Api\Controllers;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;
use Geocoder;

class MapController extends ApiGuardController
{
    protected $apiMethods = [
        'geolocalisation' => [
            'keyAuthentication' => false,
            'limits' => [
                'key' => [
                    'increment' => '1 hour',
                    'limit' => 50
                ],
                'method' => [
                    'increment' => '1 day',
                    'limit' => 1250
                ]
            ]
        ],
        'address' => [
            'keyAuthentication' => false,
            'limits' => [
                'key' => [
                    'increment' => '1 hour',
                    'limit' => 50
                ],
                'method' => [
                    'increment' => '1 day',
                    'limit' => 1250
                ]
            ]
        ]
    ];

    /**
     * curl "http://api.cvepdb.fr/v1/maps/geolocalisation/48.780426/2.266257"
     *
     * @param $latitude
     * @param $longitude
     * @return array
     */
    public function geolocalisation($latitude, $longitude)
    {
        $geocode = [];

        $latitude = urldecode($latitude);
        $longitude = urldecode($longitude);

        try {
            $geocode = Geocoder::geocode('json', ["latlng"=>"$latitude,$longitude"]);
            $geocode = json_decode($geocode);
        }
        catch (\Exception $e) {

            // Todo : send to sentry

            // echo $e->getMessage(); exit;

        }
        return [$geocode];
    }

    /**
     * curl "http://api.cvepdb.fr/v1/maps/address/plessis%20robinson"
     *
     * @param $address
     * @return array
     */
    public function address($address)
    {
        $geocode = [];

        $address = urldecode($address);

        try {
            $geocode = Geocoder::geocode('json', ["address" => $address]);
            $geocode = json_decode($geocode);
        }
        catch (\Exception $e) {

            // Todo : send to sentry

             //echo $e->getMessage(); exit;

        }
        return [$geocode];
    }
}
