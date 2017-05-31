<?php

namespace App\Http\Controllers;

use App\Travell;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class TravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $travels = DB::table('travels')->where([
                                                    ['driver_id','=',1],
                                                    ['travel_status_user','<>','T'],
                                                    ['travel_status_driver','<>','T']
            ])->get();
            $respuesta= [
                'code'   => 200,
                'msg'    => $travels,
                'detail' => sizeof($travels)." Registros obtenidos"
            ];

        }catch(\Exception $e){
            $respuesta= [
                'code'   => 500,
                'msg'    => $e->getMessage(),
                'detail' => $e->getCode()
            ];
        }
        return Response::json($respuesta);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       try {
           $viajes = DB::table('travels')
                     ->select(DB::raw('count(*) as registros'))
                     ->where([
                          ['user_id',$request->input('user_id')],
                          ['driver_id',1]]
                     )->get();
           //por defecto ambos campos de status se llenan en E
           if($viajes[0]->registros<1) {
               $viaje = DB::table('travels')->insertGetId([
                   'user_id' => $request->input('user_id'),
                   'latitud' => $request->input('latitud'),
                   'longitud' => $request->input('longitud')
               ]);
               $respuesta = [
                   'code' => 200,
                   'msg'  =>  $viaje,
                   'detail' => "Se registró el viaje exitosamente con el id: ". $viaje
               ];
           }else{
               $respuesta = [
                   'code' => 403,
                   'msg'  =>  "Lo sentimos no puedes pedir otro viaje hasta que cancele la peticion anterior",
                   'detail' => "Ya tiene una solicitud de viaje en espera"
               ];
           }
       }catch (\Exception $e){
           $respuesta = [
               'code' => 500,
               'msg'  => "Hemos tenido un error inesperado: ". $e->getMessage(),
               'detail' => "Codigo de error: ". $e->getCode()
           ];
       }

       return Response::json($respuesta);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try{
            $viaje = Travell::findOrFail($id);
            $respuesta = [
                'code' => 200,
                'msg'  => $viaje,
                'detail' => "Hemos encontrado este viaje"
            ];
        }catch(\Exception $e){
            $respuesta = [
                'code' => 404,
                'msg'  => "No existe ningun viaje con el id especificado",
                'detail' => "Codigo de error: ". $e->getCode()
            ];
        }

        return Response::json($respuesta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //cuando asignamos el viaje
    public function update(Request $request, $id)
    {
        try{
            $viaje  = Travell::findOrFail($id);

            DB::table('travels')->where('id',$id) ->update(['driver_id'=>(int) $request->input('driver_id'),
                                                            'travel_status_user' => 'A',
                                                            'travel_status_driver' => 'A'
                                                           ]);
            $datosviaje = [
                "id" => $viaje->id,
                "latitud" => $viaje->latitud,
                "longitud" => $viaje->longitud
            ];
            $respuesta = [
                'code' => 200,
                'msg'  => json_encode($datosviaje),
                'detail' => "Recuerda otorgar un excelente servicio"
            ];
        }catch(\Exception $e){
            $respuesta = [
                'code' => 500,
                'msg'  => "Hemos tenido un error inesperado: ". $e->getMessage(),
                'detail' => "Codigo de error: ". $e->getCode()
            ];
        }

        return Response::json($respuesta);

    }

    //terminamos del lado del taxi
    public function terminate(Request $request, $id){
        try{
            $viaje  = Travell::findOrFail($id);

            DB::table('travels')->where('id',$id) ->update(['travel_status_driver' => 'T'
            ]);
            $respuesta = [
                'code' => 200,
                'msg'  => "Haz completado el viaje con el id: ". $viaje->id,
                'detail' => "Recuerda revisar tu retroalimentacion"
            ];
        }catch(\Exception $e){
            $respuesta = [
                'code' => 500,
                'msg'  => "Hemos tenido un error inesperado: ". $e->getMessage(),
                'detail' => "Codigo de error: ". $e->getCode()
            ];
        }

        return Response::json($respuesta);
    }

    //terminamos del lado del user
    public function travelFinish(Request $request, $id){
        try{
            $viaje  = Travell::findOrFail($id);

            DB::table('travels')->where('id',$id) ->update(['travel_status_user' => 'T'
            ]);
            $respuesta = [
                'code' => 200,
                'msg'  => "Nos Alegra que haya llegado a su destino",
                'detail' => "Estamos para usted cuando lo requiera"
            ];
        }catch(\Exception $e){
            $respuesta = [
                'code' => 500,
                'msg'  => "Hemos tenido un error inesperado: ". $e->getMessage(),
                'detail' => "Codigo de error: ". $e->getCode()
            ];
        }

        return Response::json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Este es el delete (cancelacion)
    public function destroy($id)
    {
        try {
            $viaje = Travell::findOrFail($id);
            $viaje->delete();
            $respuesta = [
                'code' => 200,
                'msg'  => "Lamentamos que haya cancelado este viaje",
                'detail' => "Si tiene alguna queja no se olvide de contactarnos"
            ];
        }catch (\Exception $e){
            $respuesta = [
                'code' => 500,
                'msg'  => "Hemos tenido un error inesperado: ". $e->getMessage(),
                'detail' => "Codigo de error: ". $e->getCode()
            ];
        }
        return Response::json($respuesta);
    }
}
