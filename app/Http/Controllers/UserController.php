<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Response;

class UserController extends Controller
{

    public function login(Request $request ){

        $user = DB::table('users')->where('email',$request->input('email'))->get();
        if(!empty($user)){
            //si retorna un
            if($user[0]->password == $request->input('password')){
                $respuesta = [
                    'code' => 200,
                    'msg' => Hash::make($user[0]->id),
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
    }
}
