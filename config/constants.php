<?php

use App\Models\GPSCoordinate;

return [
    'defaults' => [
        'URL' => base_path('Data\customers.txt'),
        'TEST_URL' => base_path('Data\customersTest.txt'),
        'JSON_USER_ID' => 'user_id',
        'JSON_NAME' => 'name',
        'JSON_LATITUDE' => 'latitude',
        'JSON_LONGITUDE' => 'longitude',
        'OFFICE_GPS_COORDINATE' => new GPSCoordinate([53.339428, -6.257664]),
        'RANGE' => 100,
        'EARTH_RADIUS' => 6371,
    ]
];
