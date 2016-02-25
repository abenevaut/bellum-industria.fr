<?php

namespace App\Api\Controllers;

use Chrisbjr\ApiGuard\Http\Controllers\ApiGuardController;

class MapController extends ApiGuardController
{
    protected $apiMethods = [
        'geolocalisation' => [
            'keyAuthentication' => false,
            'level' => 10,
            'limits' => [
                'key' => [
                    'increment' => '1 hour',
                    'limit' => 5
                ],
                'method' => [
                    'increment' => '1 day',
                    'limit' => 20
                ]
            ]
        ],
        'address' => [
            'keyAuthentication' => false,
            'level' => 10,
            'limits' => [
                'key' => [
                    'increment' => '1 hour',
                    'limit' => 5
                ],
                'method' => [
                    'increment' => '1 day',
                    'limit' => 20
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
            $geocode = \Geocoder::reverse($latitude, $longitude);
        }
        catch (\Exception $e) {

            // Todo : send to sentry

            // echo $e->getMessage(); exit;

        }
        return ['results' => $geocode];
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
            $geocode = \Geocoder::geocode($address);
        }
        catch (\Exception $e) {

            // Todo : send to sentry

             //echo $e->getMessage(); exit;

        }
        return ['results' => $geocode];
    }
}
