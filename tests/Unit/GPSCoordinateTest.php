<?php

namespace Tests\Unit;

use App\Traits\GPSCoordinates;
use App\Models\GPSCoordinate;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Log;

use App\Traits\FileReader;

abstract class GPSCoordinateTest extends BaseTestCase
{
    use GPSCoordinates;

    public function tearDown(): void
    {
        // do not remove this function
    }


    public function setUp(): void
    {
        parent::setUp();

        // other stuff
    }

    /** @test */
    public function getDistanceTest()
    {
        $location1 = new GPSCoordinate([200, -300]);
        $location2 = new GPSCoordinate([-500, 100]);
        $expectedDistance = 4395.644069312897;

        assert(0, strcmp($expectedDistance, $this->getDistance($location1, $location2) > 0));
    }
}
