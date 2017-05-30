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
        User::create([
            'name' => 'Carlos Eduardo Hernandez Velador',
            'email' => 'caedhernandezve@ittepic.edu.mx',
            'cellphone' => '3111566022',
            'password' => "123456",
            'facebook' => 'https://www.facebook.com/Jhonee.Jhonee'
        ]);

        User::create([
            'name' => 'Jonathan Camarena Ortega',
            'email' => 'jocamarenaor@ittepic.edu.mx',
            'cellphone' => '3111956909',
            'password' => "123456",
            'facebook' => 'https://www.facebook.com/Jhonee.Jhonee2'
        ]);

        User::create([
            'name' => 'Alexis Hermosillo Becerra',
            'email' => 'alexhermo@ittepic.edu.mx',
            'cellphone' => '3112565164',
            'password' => "123456",
            'facebook' => 'https://www.facebook.com/Jhonee.Jhonee3'
        ]);

        User::create([
            'name' => 'Tony Valencia Torres',
            'email' => 'tony@ittepic.edu.mx',
            'cellphone' => '3112344321',
            'password' => "123456",
            'facebook' => 'https://www.facebook.com/Jhonee.Jhonee4'
        ]);

        User::create([
            'name' => 'Minerva Anahi Sanchez Pacheco',
            'email' => 'minerva@ittepic.edu.mx',
            'cellphone' => '3111104532',
            'password' => "123456",
            'facebook' => 'https://www.facebook.com/Jhonee.Jhonee5'
        ]);

        User::create([
            'name' => 'Mizael Chacon Lopez',
            'email' => 'miza@ittepic.edu.mx',
            'cellphone' => '3112343211',
            'password' => "123456",
            'facebook' => 'https://www.facebook.com/Jhonee.Jhonee6'
        ]);
    }
}
