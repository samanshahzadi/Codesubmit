<?php

namespace App\Traits;

use App\Models\GPSCoordinate;

trait GPSCoordinates
{

    public function getDistance(GPSCoordinate $location1, GPSCoordinate $location2): float
    {
        $earthRadius = config('constants.defaults');

        $r = (int) $earthRadius['EARTH_RADIUS']; // Radius of the earth

        $latDistance = (float) deg2rad($location2->getLatitude() - $location1->getLatitude());
        $lonDistance = (float) deg2rad($location2->getLongitude() - $location1->getLongitude());
        $a = (float) sin($latDistance / 2) * sin($latDistance / 2)
            + cos(deg2rad($location1->getLatitude()) * cos(deg2rad($location2->getLatitude())))
            * sin($lonDistance / 2) * sin($lonDistance / 2);
        $c = (float) 2 * atan2(sqrt($a), sqrt(1 - $a));

        return sqrt(pow($r * $c, 2));
    }
}
