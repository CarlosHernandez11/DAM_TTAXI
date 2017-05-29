<?php

use App\Driver_Car;
use Illuminate\Database\Seeder;

class UDriver_CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver_Car::create([
            'car_id' => 1,
            'driver_id' => 2
        ]);
        Driver_Car::create([
            'car_id' => 2,
            'driver_id' => 1
        ]);
    }
}
