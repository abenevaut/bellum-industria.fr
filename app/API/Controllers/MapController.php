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
     * @param $year
     * @return mixed
     */
    public function geolocalisation($latitude, $longitude)
    {
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
