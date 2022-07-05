<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Log;

use App\Traits\FileReader;

abstract class FileReaderTest extends BaseTestCase
{
    use FileReader;

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
    public function getCustomerstest()
    {
        $defaults       =   config('constants.defaults');
        $url            =   $defaults['TEST_URL'];
        $customers = $this->getCustomers($url);
        assert(count($customers) === 8);
    }


    /** @Test */
    public function getCustomersListFromJsonListTest($customerJsonObjects)
    {
        $defaults = config('constants.defaults');
        $customers = [
            [
                "latitude"=> "53.008769",
                "user_id"=> 11,
                "name"=> "Richard Finnegan",
                "longitude"=> "-6.1056711"
            ],
            [
                "latitude"=> "53.1489345",
                "user_id"=> 31,
                "name"=> "Alan Behan",
                "longitude"=> "-6.8422408"
            ]
        ];

        
        $customers = $this->getCustomersListFromJsonList($customers);

        assert(2, count($customers));
        assert(11, $customers[0]->getUserId());
        assert("Alan Behan", $customers[1]->getName());
        assert(0, strcmp(53.008769, $customers[0]->getLocation()->getLatitude()));
        assert(0, strcmp(-6.8422408, $customers[1]->getLocation()->getLongitude()));
    }
}
