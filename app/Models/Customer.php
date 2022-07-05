<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * @Customer class
 */

class Customer extends Model
{
    use HasFactory;

    private int $_userId;
    private String $_name;
    private GPSCoordinate $_location;

    protected $fillable = ['user_id', 'name'];

    public function __construct($args)
    {
        $this->_userId = $args[0];
        $this->_name = $args[1];
        $this->_location = $args[2];
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return "user_id: " . $this->_userId .
            ", name: " . $this->_name;
    }

    public function getLocation()
    {
        return $this->_location;
    }

    public function getUserId()
    {
        return $this->_userId;
    }

    public function getName()
    {
        return $this->_name;
    }
}
