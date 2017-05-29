<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UserSeeder::class);
         $this->call(CarSeeder::class);
         $this->call(DriverSeeder::class);
         $this->call(UDriver_CarSeeder::class);

    }
}
