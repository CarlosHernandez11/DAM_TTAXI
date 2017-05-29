<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $table = "cars";
    protected $fillable = [
        'brand', 'model', 'year', 'starting_km',
        'current_km', 'cylinder', 'fuel', 'color', 'unit_number'
    ];
    public $timestamps = false;
}
