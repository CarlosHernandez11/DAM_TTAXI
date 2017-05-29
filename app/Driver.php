<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
   protected $table = "drivers";
   protected $fillable = [
       'name', 'lastname', 'permission_number',
       'address', 'syndicate'
   ];

   public $timestamps = false;
}
