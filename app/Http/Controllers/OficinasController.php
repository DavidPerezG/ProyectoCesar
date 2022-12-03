<?php

namespace App\Http\Controllers;

use App\Models\Oficinas;
use Illuminate\Http\Request;

class OficinasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function obtenerTodos()
    {
        $oficinas = Oficinas::paginate(20);
        return $oficinas;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function crear(Request $request){
        $data = $this->validateRequest($request);

        $Oficinas = Oficinas::create($data);
        if($Oficinas){
            return response ([
                'message' => 'Se creo con exito la Oficina',
                'id' => $Oficinas['id']
            ], 201);
        } else {
            return response ([
                'message' => 'Error al crear',
                'id' => $Oficinas['id']
            ], 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function obtener($id){
        $venta =  Oficinas::find($id);
        return $venta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function modificar($id, Request $request)
    {
        $Oficinas = Oficinas::find($id);

        if(!$Oficinas) {
            return response([
                'message' => 'LA Oficina con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $data = $this->validateRequest($request);

        $Oficinas->update($data);
        return response([
            'message' => 'Se modifico la Oficina con exito'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Oficinas  $oficinas
     * @return \Illuminate\Http\Response
     */
    public function eliminar($id)
    {
        $Oficina = Oficinas::find($id);

        if(!$Oficina) {
            return response([
                'message' => 'El Oficina con el id ' . $id . ' no existe en la BD'
            ], 404);
        }

        $Oficina->delete();
        return response ([
            'message' => 'Se elimino con exito'
        ]);
    }


    private function validateRequest($request){
        return $request->validate([
            'direccion' => '',
            'localidad' => 'required|string',
            'provincia' => 'required|string',
        ]);
    }
}
