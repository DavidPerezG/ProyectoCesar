<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerTodos()
    {
        $reservas = Reservas::with('empleados')->with('vehiculos')->get();

        return $reservas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request){
        $data = $this->validateRequestPost($request);

        $Reservas = Reservas::create($data);
        if($Reservas){
            return response ([
                'message' => 'Se creo con exito la Reserva',
                'id' => $Reservas['id']
            ], 201);
        } else {
            return response ([
                'message' => 'Error al crear',
                'id' => $Reservas['id']
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function obtener($id){
        $reserva =  Reservas::find($id);
        $reserva = Reservas::find($id)->with('empleados')->with('vehiculos')->first();

        return $reserva;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function modificar($id, Request $request)
    {
        $Reservas = Reservas::find($id);
        if(!$Reservas) {
            return response([
                'message' => 'el Reserva con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $data = $this->validateRequestPut($request);
        $Reservas->update($data);
        return response([
            'message' => 'Se modifico el Reserva con exito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $Reserva = Reservas::find($id);

        if(!$Reserva) {
            return response([
                'message' => 'El Reserva con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $Reserva->delete();
        return response ([
            'message' => 'Se elimino con exito'
        ]);
    }


    private function validateRequestPut($request){
        return $request->validate([
            'fecha' => 'string',
            'destino' => 'string',
            'kilometros' => 'integer',
            'id_empleado' => 'integer',
            'id_vehiculo' => 'integer'
        ]);
    }

    private function validateRequestPost($request){
        return $request->validate([
            'fecha' => 'required|string',
            'destino' => 'required|string',
            'kilometros' => 'required|integer',
            'id_empleado' => 'required|integer',
            'id_vehiculo' => 'required|integer'
        ]);
    }
}
