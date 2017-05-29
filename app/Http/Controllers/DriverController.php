<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class DriverController extends Controller
{
    public function login(Request $request ){
	return Response::json($request);
/*
        $driver = DB::table('drivers')->where('permission_number',$request->input('permission_number'))->get();
        if(!empty($driver)){
            //si retorna un valor
            if($driver[0]->password == $request->input('password')){
                $respuesta = [
                    'code' => 200,
                    'msg' => Hash::make($driver[0]->id),
                    'detail' => "Inicio de sesión correcto"
                ];
            }else{
                $respuesta = [
                    'code' => 500,
                    'msg' => "Las credenciales ingresadas son incorrectas",
                    'detail' => "El inicio de sesion no se logró"
                ];
            }
        }else{
            //si no existe
            $respuesta = [
                'code' => 500,
                'msg' => "Las credenciales ingresadas son incorrectas",
                'detail' => "El inicio de sesion no se logró"
            ];
        }
        return Response::json($respuesta);
*/
    }
}
