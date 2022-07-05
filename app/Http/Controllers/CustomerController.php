<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Traits\FileReader;
use App\Traits\GPSCoordinates;

use App\Models\GPSCoordinate;

class CustomerController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use FileReader, GPSCoordinates;

    public function processData()
    {
        $output = [];
        $defaults       =   config('constants.defaults');

        $range          =   $defaults['RANGE'];
        $url            =   $defaults['URL'];

        try {

            $customers      =   $this->getCustomers($url);

            $csInRange      = $this->getCustomersInDistance($customers, $defaults['OFFICE_GPS_COORDINATE'], $range);
            $colection = collect($csInRange);
            $users = $colection->sortBy(function ($customer) {
                return $customer->getUserId();
            });


            foreach ($users as $u) {
                $data = [];
                $data[$defaults['JSON_USER_ID']] = $u->getUserId();
                $data[$defaults['JSON_NAME']] = $u->getName();

                $output[] = $data;
            }

            return $output;
        } catch (Exception $e) {
            echo ($e->getMessage());
        }
    }

    public function getCustomersInDistance(array $customers, GPSCoordinate $filterLocation, float $kmRange)
    {
        $list = array();

        foreach ($customers as $customer) {
            if (strcmp($kmRange, $this->getDistance($customer->getLocation(), $filterLocation)) > 0) {
                array_push($list, $customer);
            }
        }

        return $list;
    }
}
