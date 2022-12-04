<?php

namespace App\Http\Controllers;

use App\Models\Vehiculos;
use Illuminate\Http\Request;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerTodos()
    {
        $vehiculos = Vehiculos::paginate(20);
        return $vehiculos;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request){
        $data = $this->validateRequest($request);

        $Vehiculos = Vehiculos::create($data);
        if($Vehiculos){
            return response ([
                'message' => 'Se creo con exito la Vehiculos',
                'id' => $Vehiculos['id']
            ], 201);
        } else {
            return response ([
                'message' => 'Error al crear',
                'id' => $Vehiculos['id']
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function obtener($id){
        $vehiculo =  Vehiculos::find($id);
        return $vehiculo;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function modificar($id, Request $request)
    {
        $Vehiculos = Vehiculos::find($id);

        if(!$Vehiculos) {
            return response([
                'message' => 'El Vehiculo con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $data = $this->validateRequest($request);

        $Vehiculos->update($data);
        return response([
            'message' => 'Se modifico el Vehiculo con exito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vehiculos  $vehiculos
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $Vehiculos = Vehiculos::find($id);

        if(!$Vehiculos) {
            return response([
                'message' => 'El Vehiculo con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $Vehiculos->delete();
        return response ([
            'message' => 'Se elimino con exito'
        ]);
    }


    private function validateRequest($request){
        return $request->validate([
            'descripcion' => 'required|string',
        ]);
    }
}
