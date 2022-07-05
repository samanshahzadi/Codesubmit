<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @GPSCoordinate class
 */

class GPSCoordinate extends Model
{
    use HasFactory;

    private float $_latitude;
    private float $_longitude;

    protected $fillable = ['latitude', 'longitude'];

    public function __construct($args)
    {
        $this->_latitude = $args[0];
        $this->_longitude = $args[1];
    }

    /**
     * Convert object into string
     * @return string
     */
    public function __toString()
    {
        return "latitude: " . $this->_latitude . ", longitude: " . $this->_longitude;
    }

    public function getLatitude()
    {
        return $this->_latitude;
    }

    public function getLongitude()
    {
        return $this->_longitude;
    }
}
