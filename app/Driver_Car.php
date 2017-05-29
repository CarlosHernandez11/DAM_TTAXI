<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver_Car extends Model
{
    protected $table = 'car_drivers';
    protected $fillable = [
        'car_id', 'driver_id'
    ];

    public $timestamps = false;
}
