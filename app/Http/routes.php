<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/api/test/travel','TravelController');
Route::post('/api/test/user/login','UserController@login');
Route::post('/api/test/driver/login','DriverController@login');
Route::post('/api/test/driver/finish/{id}','TravelController@terminate'); //Termino del viaje segun el taxista
Route::post('/api/test/user/finish/{id}','TravelController@travelFinish'); //termino del viaje segun el cliente
Route::post('/api/test/travels/id','TravelController@id');