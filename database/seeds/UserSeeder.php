<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Jonathan Camarena Ortega',
            'email' => 'jocamarenaor@ittepic.edu.mx',
            'cellphone' => '3111956909',
            'password' => "123456",
            'facebook' => 'https://www.facebook.com/Jhonee.Jhonee'
        ]);
    }
}
