<?php

namespace App\Http\Controllers;

use App\Models\Empleados;
use Illuminate\Http\Request;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerTodos()
    {
        $empleados = Empleados::with('oficinas')->get();

        return $empleados;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request){
        $data = $this->validateRequest($request);

        $Empleados = Empleados::create($data);
        if($Empleados){
            return response ([
                'message' => 'Se creo con exito el Empleado',
                'id' => $Empleados['id']
            ], 201);
        } else {
            return response ([
                'message' => 'Error al crear',
                'id' => $Empleados['id']
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function obtener($id){
        $empleado = Empleados::find($id)->with('oficinas')->first();
        return $empleado;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function modificar($id, Request $request)
    {
        $Empleados = Empleados::find($id);
        if(!$Empleados) {
            return response([
                'message' => 'el Empleado con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $data = $this->validateRequestPut($request);
        $Empleados->update($data);
        return response([
            'message' => 'Se modifico el Empleado con exito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $Oficina = Empleados::find($id);

        if(!$Oficina) {
            return response([
                'message' => 'El Empleado con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $Oficina->delete();
        return response ([
            'message' => 'Se elimino con exito'
        ]);
    }


    private function validateRequest($request){
        return $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'salario' => 'required|string',
            'fecha' => 'date|required',
            'id_oficina' => 'integer'
        ]);
    }

    private function validateRequestPut($request){
        return $request->validate([
            'nombre' => 'string',
            'apellidos' => 'string',
            'salario' => 'string',
            'fecha' => 'date',
        ]);
    }
}
