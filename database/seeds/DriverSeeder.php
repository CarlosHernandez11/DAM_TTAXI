<?php

use App\Driver;
use Illuminate\Database\Seeder;

class DriverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Driver::create([
            'name'=>"No asignado",
            "lastname" => "Sin asignar",
            "permission_number"=> "000000",
            "address" => "sin registrar",
            "syndicate" => "Sin sindicato",
            "password" => '123456'
        ]);

        Driver::create([
            'name'=>"Carlos Eduardo",
            "lastname" => "Hernandez Velador",
            "permission_number"=> "0015478",
            "address" => "Encino #1085 col. valle de la cruz",
            "syndicate" => "Taxis Blancos de Tepic",
            "password" => '123456'
        ]);

        Driver::create([
            'name'=>"Alexis ",
            "lastname" => "Hermosillo Becerra",
            "permission_number"=> "0015588",
            "address" => "Sauce #478 col. Los Sauces",
            "syndicate" => "Taxis Amarillos de Tepic",
            "password" => '123456'
        ]);
    }
}
