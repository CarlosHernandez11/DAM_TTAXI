<?php

use App\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::create([
            "brand" => "Volkswagen",
            "model" => "Vento",
            "year" => "2016",
            "starting_km" => "1234",
            "current_km" => "1238",
            "cylinder" => "4",
            "fuel" => "gasolina",
            "color" => "blanco",
            "unit_number" =>'AAA-00-00'
        ]);
        Car::create([
            "brand" => "Nissan",
            "model" => "Versa",
            "year" => "2015",
            "starting_km" => "1000",
            "current_km" => "1200",
            "cylinder" => "6",
            "fuel" => "gasolina",
            "color" => "Amarillo",
            "unit_number" =>'AAA-00-01'
        ]);
    }
}
