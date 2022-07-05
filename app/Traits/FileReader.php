<?php

namespace App\Traits;

use App\Models\GPSCoordinate;
use App\Models\Customer;
use Exception;

trait FileReader
{

    public function getCustomers($fileURL)
    {
        $customers = array();
        try {
            $handle = fopen($fileURL, 'r');
            if ($handle !== false) {
                while (($data = fgets($handle, 1000)) !== FALSE) {
                    $data = json_decode($data, true);
                    $customers[] = $data;
                }

                fclose($handle);
                return $this->getCustomersListFromJsonList($customers);
            }
        } catch (Exception $ex) {
            dd($ex->getMessage());
        }
    }

    public static function getCustomersListFromJsonList($customerJsonObjects)
    {
        $defaults = config('constants.defaults');
        $customers = array();
        foreach ($customerJsonObjects as $cs) {
            $location = new GPSCoordinate(
                [
                    $cs[$defaults['JSON_LATITUDE']],
                    $cs[$defaults['JSON_LONGITUDE']]
                ]
            );
            $customer = new Customer(
                [
                    $cs[$defaults['JSON_USER_ID']],
                    $cs[$defaults['JSON_NAME']],
                    $location
                ]
            );

            array_push($customers, $customer);
        }

        return $customers;
    }
}
